<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    protected string $mediaPath;

    public function __construct()
    {
        $this->mediaPath = public_path('assets/media');
        if (!is_dir($this->mediaPath)) {
            mkdir($this->mediaPath, 0755, true);
        }
    }

    /**
     * Display a listing of all visual assets in public/assets/media.
     */
    public function index(Request $request): View|JsonResponse
    {
        $search = strtolower(trim($request->query('search', '')));
        $format = strtolower(trim($request->query('format', 'all')));

        $files = scandir($this->mediaPath);
        $allowedExtensions = ['webp', 'jpg', 'jpeg', 'png', 'svg', 'gif'];

        $mediaItems = [];
        $totalBytes = 0;
        $formatCounts = [
            'all' => 0,
            'webp' => 0,
            'jpeg' => 0,
            'png' => 0,
            'svg' => 0,
        ];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $fullPath = $this->mediaPath . DIRECTORY_SEPARATOR . $file;
            if (!is_file($fullPath)) {
                continue;
            }

            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowedExtensions)) {
                continue;
            }

            $fileSize = filesize($fullPath);
            $totalBytes += $fileSize;
            $formatCounts['all']++;

            if ($ext === 'webp') {
                $formatCounts['webp']++;
            } elseif ($ext === 'jpg' || $ext === 'jpeg') {
                $formatCounts['jpeg']++;
            } elseif ($ext === 'png') {
                $formatCounts['png']++;
            } elseif ($ext === 'svg') {
                $formatCounts['svg']++;
            }

            // Keyword Search Filter
            if ($search !== '' && !str_contains(strtolower($file), $search)) {
                continue;
            }

            // Format Filter
            if ($format !== 'all') {
                if ($format === 'jpeg' && !in_array($ext, ['jpg', 'jpeg'])) {
                    continue;
                } elseif ($format !== 'jpeg' && $ext !== $format) {
                    continue;
                }
            }

            // Dimensions
            $width = null;
            $height = null;
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $imgInfo = @getimagesize($fullPath);
                if ($imgInfo) {
                    $width = $imgInfo[0];
                    $height = $imgInfo[1];
                }
            }

            // Check if companion format exists
            $basenameWithoutExt = pathinfo($file, PATHINFO_FILENAME);
            $hasWebpCompanion = file_exists($this->mediaPath . DIRECTORY_SEPARATOR . $basenameWithoutExt . '.webp');
            $hasJpgCompanion = file_exists($this->mediaPath . DIRECTORY_SEPARATOR . $basenameWithoutExt . '.jpg') 
                || file_exists($this->mediaPath . DIRECTORY_SEPARATOR . $basenameWithoutExt . '.jpeg');

            $mediaItems[] = [
                'filename' => $file,
                'basename' => $basenameWithoutExt,
                'extension' => $ext,
                'url' => asset('assets/media/' . $file),
                'relative_path' => 'assets/media/' . $file,
                'asset_code' => "asset('assets/media/{$file}')",
                'size_bytes' => $fileSize,
                'size_formatted' => $this->formatFileSize($fileSize),
                'width' => $width,
                'height' => $height,
                'dimensions' => $width && $height ? "{$width} × {$height}" : ($ext === 'svg' ? 'Vector SVG' : '—'),
                'modified_at' => date('M d, Y H:i', filemtime($fullPath)),
                'modified_timestamp' => filemtime($fullPath),
                'has_webp' => $hasWebpCompanion,
                'has_jpg' => $hasJpgCompanion,
            ];
        }

        // Sort: newest first
        usort($mediaItems, fn($a, $b) => $b['modified_timestamp'] <=> $a['modified_timestamp']);

        // Manual Pagination for the collection
        $perPage = 24;
        $currentPage = (int) $request->query('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedItems = array_slice($mediaItems, $offset, $perPage);

        $paginator = new LengthAwarePaginator(
            $paginatedItems,
            count($mediaItems),
            $perPage,
            $currentPage,
            ['path' => route('admin.media.index'), 'query' => $request->query()]
        );

        $totalSizeFormatted = $this->formatFileSize($totalBytes);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'items' => $paginatedItems,
                'total' => count($mediaItems),
                'totalSize' => $totalSizeFormatted,
                'formatCounts' => $formatCounts,
            ]);
        }

        return view('admin.media.index', [
            'media' => $paginator,
            'totalCount' => count($mediaItems),
            'totalBytes' => $totalBytes,
            'totalSizeFormatted' => $totalSizeFormatted,
            'formatCounts' => $formatCounts,
            'search' => $search,
            'format' => $format,
        ]);
    }

    /**
     * Upload one or multiple images, automatically creating companion WebP/JPEG variants.
     */
    public function upload(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|file|mimes:jpeg,jpg,png,webp,svg,gif|max:15360',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpeg,jpg,png,webp,svg,gif|max:15360',
            'custom_name' => 'nullable|string|max:100',
        ]);

        $uploadedFiles = [];
        if ($request->hasFile('image')) {
            $uploadedFiles[] = $request->file('image');
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $f) {
                $uploadedFiles[] = $f;
            }
        }

        if (empty($uploadedFiles)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'No image file was provided.'], 422);
            }
            return back()->with('error', 'No image file was provided.');
        }

        $savedFilenames = [];

        foreach ($uploadedFiles as $file) {
            $origName = $file->getClientOriginalName();
            $origBase = pathinfo($origName, PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());

            $baseSlug = $request->filled('custom_name') && count($uploadedFiles) === 1
                ? Str::slug($request->input('custom_name'))
                : Str::slug($origBase);

            if (empty($baseSlug)) {
                $baseSlug = 'pge-media-' . time();
            }

            $primaryFilename = "{$baseSlug}.{$ext}";
            $targetPath = $this->mediaPath . DIRECTORY_SEPARATOR . $primaryFilename;

            // Move uploaded file
            $file->move($this->mediaPath, $primaryFilename);
            $savedFilenames[] = $primaryFilename;

            // Generate Companion Variants
            $this->generateCompanions($targetPath, $baseSlug, $ext);
        }

        $message = count($savedFilenames) === 1
            ? "Image '{$savedFilenames[0]}' uploaded successfully (with WebP & JPEG optimization)!"
            : count($savedFilenames) . " images uploaded successfully with WebP & JPEG optimization!";

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'files' => $savedFilenames,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', $message);
    }

    /**
     * Replace an existing image file in-place, keeping all links and references active.
     */
    public function replace(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'target_filename' => 'required|string',
            'replacement_image' => 'required|file|mimes:jpeg,jpg,png,webp,svg,gif|max:15360',
        ]);

        $targetFilename = basename($request->input('target_filename'));
        $targetPath = $this->mediaPath . DIRECTORY_SEPARATOR . $targetFilename;

        if (!file_exists($targetPath)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => "Target file '{$targetFilename}' does not exist."], 404);
            }
            return back()->with('error', "Target file '{$targetFilename}' does not exist.");
        }

        $baseSlug = pathinfo($targetFilename, PATHINFO_FILENAME);
        $targetExt = strtolower(pathinfo($targetFilename, PATHINFO_EXTENSION));

        $newFile = $request->file('replacement_image');

        // Overwrite the target file directly
        $newFile->move($this->mediaPath, $targetFilename);

        // Regenerate companion variant so WebP and JPEG remain synchronized
        $this->generateCompanions($targetPath, $baseSlug, $targetExt);

        $message = "Asset '{$targetFilename}' was replaced in-place. All website pages will immediately display the new image!";

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'filename' => $targetFilename,
                'url' => asset('assets/media/' . $targetFilename) . '?v=' . time(),
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', $message);
    }

    /**
     * Rename a media file on disk and update any package references.
     */
    public function rename(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'old_filename' => 'required|string',
            'new_name' => 'required|string|max:100',
        ]);

        $oldFilename = basename($request->input('old_filename'));
        $oldPath = $this->mediaPath . DIRECTORY_SEPARATOR . $oldFilename;

        if (!file_exists($oldPath)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Original file does not exist.'], 404);
            }
            return back()->with('error', 'Original file does not exist.');
        }

        $ext = strtolower(pathinfo($oldFilename, PATHINFO_EXTENSION));
        $oldBase = pathinfo($oldFilename, PATHINFO_FILENAME);
        $newBase = Str::slug($request->input('new_name'));

        if (empty($newBase)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Invalid new name.'], 422);
            }
            return back()->with('error', 'Invalid new name.');
        }

        $newFilename = "{$newBase}.{$ext}";
        $newPath = $this->mediaPath . DIRECTORY_SEPARATOR . $newFilename;

        if (file_exists($newPath) && $newFilename !== $oldFilename) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => "A file named '{$newFilename}' already exists."], 422);
            }
            return back()->with('error', "A file named '{$newFilename}' already exists.");
        }

        rename($oldPath, $newPath);

        // Also rename companion sibling if present (e.g. .webp <-> .jpg)
        $companionExts = ['webp', 'jpg', 'jpeg', 'png'];
        foreach ($companionExts as $cExt) {
            if ($cExt !== $ext) {
                $oldCompanion = $this->mediaPath . DIRECTORY_SEPARATOR . "{$oldBase}.{$cExt}";
                $newCompanion = $this->mediaPath . DIRECTORY_SEPARATOR . "{$newBase}.{$cExt}";
                if (file_exists($oldCompanion)) {
                    rename($oldCompanion, $newCompanion);
                }
            }
        }

        // Update database packages table if featured_image points to this file
        $oldDbPath = "/assets/media/{$oldFilename}";
        $newDbPath = "/assets/media/{$newFilename}";
        Package::where('featured_image', $oldDbPath)->update(['featured_image' => $newDbPath]);

        // Also check companion in database
        $oldDbWebp = "/assets/media/{$oldBase}.webp";
        $newDbWebp = "/assets/media/{$newBase}.webp";
        Package::where('featured_image', $oldDbWebp)->update(['featured_image' => $newDbWebp]);

        $message = "File renamed to '{$newFilename}' successfully!";

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'new_filename' => $newFilename,
                'new_url' => asset('assets/media/' . $newFilename),
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', $message);
    }

    /**
     * Delete an asset from disk.
     */
    public function destroy(Request $request, string $filename): JsonResponse|RedirectResponse
    {
        $filename = basename($filename);
        $filePath = $this->mediaPath . DIRECTORY_SEPARATOR . $filename;

        if (!file_exists($filePath)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'File does not exist.'], 404);
            }
            return back()->with('error', 'File does not exist.');
        }

        unlink($filePath);

        // Check if user requested deleting companion sibling
        if ($request->boolean('delete_companion')) {
            $base = pathinfo($filename, PATHINFO_FILENAME);
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $companionExt = ($ext === 'webp') ? 'jpg' : 'webp';
            $companionPath = $this->mediaPath . DIRECTORY_SEPARATOR . "{$base}.{$companionExt}";
            if (file_exists($companionPath)) {
                unlink($companionPath);
            }
        }

        $message = "Asset '{$filename}' was deleted successfully.";

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', $message);
    }

    /**
     * Automatically generate companion WebP or JPEG variants for uploaded/replaced assets.
     */
    protected function generateCompanions(string $filePath, string $baseSlug, string $ext): void
    {
        if (!function_exists('imagecreatefromstring')) {
            return;
        }

        try {
            $imgData = @file_get_contents($filePath);
            if (!$imgData) return;

            $im = @imagecreatefromstring($imgData);
            if (!$im) return;

            // If uploaded JPG/PNG -> create .webp
            if (in_array($ext, ['jpg', 'jpeg', 'png']) && function_exists('imagewebp')) {
                $webpPath = $this->mediaPath . DIRECTORY_SEPARATOR . "{$baseSlug}.webp";
                if ($ext === 'png') {
                    imagepalettetotruecolor($im);
                    imagealphablending($im, true);
                    imagesavealpha($im, true);
                }
                imagewebp($im, $webpPath, 80);
            }

            imagedestroy($im);
        } catch (\Throwable $e) {
            // Silently allow main file to stay if GD companion conversion encounters unusual formats
        }
    }

    /**
     * Format raw bytes into human-readable string.
     */
    protected function formatFileSize(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 0) . ' KB';
        }
        return $bytes . ' B';
    }
}

