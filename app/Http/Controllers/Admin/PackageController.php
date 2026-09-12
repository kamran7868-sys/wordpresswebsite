<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    /**
     * Display a listing of packages with filtering and search.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $status = $request->query('status');
        $search = $request->query('search');

        $query = Package::latest();

        if ($category && in_array($category, ['holiday', 'cruise', 'hotel'])) {
            $query->where('category', $category);
        }

        if ($status && in_array($status, ['draft', 'published', 'archived'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('region', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $packages = $query->paginate(12)->withQueryString();

        $counts = [
            'all' => Package::count(),
            'holiday' => Package::where('category', 'holiday')->count(),
            'cruise' => Package::where('category', 'cruise')->count(),
            'hotel' => Package::where('category', 'hotel')->count(),
            'draft' => Package::where('status', 'draft')->count(),
            'published' => Package::where('status', 'published')->count(),
            'archived' => Package::where('status', 'archived')->count(),
        ];

        return view('admin.packages.index', compact('packages', 'category', 'status', 'search', 'counts'));
    }

    /**
     * Show the form for creating a new package.
     */
    public function create(): View
    {
        $package = new Package([
            'category' => 'holiday',
            'status' => 'draft',
            'currency' => 'USD',
            'duration_days' => 1,
            'duration_nights' => 0,
        ]);

        return view('admin.packages.create', compact('package'));
    }

    /**
     * Store a newly created package in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePackage($request);

        // Process featured hero image
        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('packages', 'public');
            $validated['featured_image'] = Storage::url($path);
        } elseif (!empty($request->input('featured_image_url'))) {
            $validated['featured_image'] = $request->input('featured_image_url');
        } else {
            $validated['featured_image'] = '/assets/logo-square-inc.png';
        }

        // Process gallery images
        $gallery = [];
        if ($request->has('existing_gallery') && is_array($request->input('existing_gallery'))) {
            $gallery = array_values(array_filter($request->input('existing_gallery')));
        }
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('packages', 'public');
                    $gallery[] = Storage::url($path);
                }
            }
        }
        $validated['gallery'] = $gallery;

        // Process JSON collections
        $validated['tags'] = $this->parseJsonArray($request->input('tags'));
        $validated['features'] = $this->parseJsonArray($request->input('features'));
        $validated['itinerary'] = $this->parseJsonArray($request->input('itinerary'));
        $validated['room_types'] = $this->parseJsonArray($request->input('room_types'));
        $validated['highlights'] = $this->parseJsonArray($request->input('highlights'));
        $validated['inclusions'] = $this->parseJsonArray($request->input('inclusions'));

        // Format duration text & defaults
        $validated['country'] = !empty($validated['country']) ? $validated['country'] : 'Global';
        $days = (int) ($validated['duration_days'] ?? 1);
        $nights = isset($validated['duration_nights']) ? (int) $validated['duration_nights'] : max(0, $days - 1);
        $validated['duration'] = "{$days} Days / {$nights} Nights";
        $validated['overview'] = $validated['short_description'];

        $package = Package::create($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', "Package '{$package->title}' created successfully.");
    }

    /**
     * Show the form for editing the specified package.
     */
    public function edit(Package $package): View
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified package in storage.
     */
    public function update(Request $request, Package $package): RedirectResponse
    {
        $validated = $this->validatePackage($request, $package->id);

        // Process hero image
        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('packages', 'public');
            $validated['featured_image'] = Storage::url($path);
        } elseif ($request->filled('featured_image_url')) {
            $validated['featured_image'] = $request->input('featured_image_url');
        }

        // Process gallery
        $gallery = [];
        if ($request->has('existing_gallery') && is_array($request->input('existing_gallery'))) {
            $gallery = array_values(array_filter($request->input('existing_gallery')));
        }
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('packages', 'public');
                    $gallery[] = Storage::url($path);
                }
            }
        }
        $validated['gallery'] = $gallery;

        // Process JSON collections
        $validated['tags'] = $this->parseJsonArray($request->input('tags'));
        $validated['features'] = $this->parseJsonArray($request->input('features'));
        $validated['itinerary'] = $this->parseJsonArray($request->input('itinerary'));
        $validated['room_types'] = $this->parseJsonArray($request->input('room_types'));
        $validated['highlights'] = $this->parseJsonArray($request->input('highlights'));
        $validated['inclusions'] = $this->parseJsonArray($request->input('inclusions'));

        // Format duration text
        $days = (int) ($validated['duration_days'] ?? 1);
        $nights = isset($validated['duration_nights']) ? (int) $validated['duration_nights'] : max(0, $days - 1);
        $validated['duration'] = "{$days} Days / {$nights} Nights";
        $validated['overview'] = $validated['short_description'];

        $package->update($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', "Package '{$package->title}' updated successfully.");
    }

    /**
     * Remove the specified package from storage (AJAX support).
     */
    public function destroy(Request $request, Package $package): JsonResponse|RedirectResponse
    {
        $title = $package->title;
        $package->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => "Package '{$title}' deleted successfully.",
            ]);
        }

        return redirect()->route('admin.packages.index')
            ->with('success', "Package '{$title}' deleted successfully.");
    }

    /**
     * Toggle package publication status (draft/published/archived).
     */
    public function status(Request $request, Package $package): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:draft,published,archived',
        ]);

        $package->update(['status' => $validated['status']]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'package_id' => $package->id,
                'package_status' => $package->status,
                'message' => "Package status updated to {$package->status}.",
            ]);
        }

        return back()->with('success', "Package status updated to {$package->status}.");
    }

    /**
     * AJAX Live Slug-Uniqueness Check.
     */
    public function checkSlug(Request $request): JsonResponse
    {
        $slug = Str::slug($request->query('slug', ''));
        $excludeId = $request->query('exclude_id');

        if (empty($slug)) {
            return response()->json(['available' => false, 'slug' => '']);
        }

        $query = Package::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $exists = $query->exists();

        return response()->json([
            'available' => !$exists,
            'slug' => $slug,
        ]);
    }

    /**
     * Validate package input data.
     */
    protected function validatePackage(Request $request, ?int $id = null): array
    {
        $slugRule = 'required|string|max:150|unique:packages,slug' . ($id ? ",{$id}" : '');

        return $request->validate([
            'category' => 'required|string|in:holiday,cruise,hotel',
            'title' => 'required|string|max:200',
            'slug' => $slugRule,
            'country' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'duration_days' => 'required|integer|min:1|max:365',
            'duration_nights' => 'nullable|integer|min:0|max:365',
            'short_description' => 'required|string',
            'price_from' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:draft,published,archived',
            'is_featured' => 'nullable|boolean',
            'featured_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'featured_image_url' => 'nullable|string|max:500',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);
    }

    /**
     * Safely parse JSON array inputs.
     */
    protected function parseJsonArray(mixed $data): array
    {
        if (is_array($data)) {
            return array_values($data);
        }

        if (is_string($data) && !empty(trim($data))) {
            $decoded = json_decode($data, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return array_values($decoded);
            }
        }

        return [];
    }
}
