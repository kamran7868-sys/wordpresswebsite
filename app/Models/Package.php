<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'slug',
        'title',
        'tagline',
        'meta_title',
        'meta_description',
        'category',
        'region',
        'country',
        'duration',
        'duration_days',
        'duration_nights',
        'price_from',
        'currency',
        'featured_image',
        'gallery',
        'overview',
        'short_description',
        'tags',
        'start_date',
        'end_date',
        'features',
        'itinerary',
        'room_types',
        'highlights',
        'inclusions',
        'exclusions',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'itinerary' => 'array',
        'room_types' => 'array',
        'highlights' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'price_from' => 'decimal:2',
        'duration_days' => 'integer',
        'duration_nights' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::saving(function (Package $package) {
            if (empty($package->country)) {
                $package->country = 'Global';
            }
            if (!empty($package->duration_days) && empty($package->duration)) {
                $nights = $package->duration_nights ?? max(0, $package->duration_days - 1);
                $package->duration = "{$package->duration_days} Days / {$nights} Nights";
            }
            if (empty($package->overview) && !empty($package->short_description)) {
                $package->overview = $package->short_description;
            } elseif (empty($package->short_description) && !empty($package->overview)) {
                $package->short_description = $package->overview;
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeRegion(Builder $query, string $region): Builder
    {
        return $query->where('region', $region);
    }

    /**
     * Return the optimal WebP image URL if available, falling back to original featured_image.
     * Auto-converts heavy storage PNGs/JPGs to lightweight WebP on-the-fly if needed.
     */
    public function getOptimizedImageAttribute(): string
    {
        $img = $this->featured_image;
        if (empty($img)) {
            return asset('assets/media/ancient-egypt-pyramids-giza.webp');
        }

        if (str_ends_with(strtolower($img), '.webp')) {
            return $img;
        }

        // Check if companion WebP candidate exists or can be generated
        $webpCandidate = preg_replace('/\.(jpe?g|png)$/i', '.webp', $img);
        if ($webpCandidate !== $img) {
            $parsedPath = parse_url($webpCandidate, PHP_URL_PATH);
            $localWebpPath = public_path(ltrim($parsedPath, '/\\'));

            if (file_exists($localWebpPath)) {
                return $webpCandidate;
            }

            // On-the-fly WebP conversion & compression for heavy storage uploads
            $origParsedPath = parse_url($img, PHP_URL_PATH);
            $origLocalPath = public_path(ltrim($origParsedPath, '/\\'));

            if (file_exists($origLocalPath) && function_exists('imagecreatefromstring')) {
                @mkdir(dirname($localWebpPath), 0755, true);
                $info = @getimagesize($origLocalPath);
                if ($info) {
                    $mime = $info['mime'];
                    $src = null;
                    if ($mime === 'image/png') {
                        $src = @imagecreatefrompng($origLocalPath);
                    } elseif ($mime === 'image/jpeg') {
                        $src = @imagecreatefromjpeg($origLocalPath);
                    }

                    if ($src) {
                        $w = imagesx($src);
                        $h = imagesy($src);
                        if ($w > 1200) {
                            $nw = 1200;
                            $nh = (int) round(($h / $w) * $nw);
                            $resized = imagecreatetruecolor($nw, $nh);
                            if ($mime === 'image/png') {
                                imagealphablending($resized, false);
                                imagesavealpha($resized, true);
                            }
                            imagecopyresampled($resized, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
                            imagedestroy($src);
                            $src = $resized;
                        }

                        if (@imagewebp($src, $localWebpPath, 82)) {
                            imagedestroy($src);
                            return $webpCandidate;
                        }
                        imagedestroy($src);
                    }
                }
            }
        }

        return $img;
    }

    /**
     * Return responsive srcset for card image display (400w, 800w, 1200w).
     */
    public function getCardImageSrcsetAttribute(): string
    {
        $optImg = $this->optimized_image;
        if (empty($optImg)) {
            return '';
        }

        $parsedPath = parse_url($optImg, PHP_URL_PATH);
        $cleanPath = ltrim($parsedPath, '/\\');
        $baseName = pathinfo($cleanPath, PATHINFO_FILENAME);

        // 1. Check in assets/media/responsive/
        if (str_contains($cleanPath, 'assets/media/')) {
            $path400 = public_path("assets/media/responsive/{$baseName}-400w.webp");
            $path800 = public_path("assets/media/responsive/{$baseName}-800w.webp");

            $sources = [];
            if (file_exists($path400)) {
                $sources[] = asset("assets/media/responsive/{$baseName}-400w.webp") . ' 400w';
            }
            if (file_exists($path800)) {
                $sources[] = asset("assets/media/responsive/{$baseName}-800w.webp") . ' 800w';
            }
            if (!empty($sources)) {
                $sources[] = $optImg . ' 1200w';
                return implode(', ', $sources);
            }
        }

        // 2. Check in storage/packages/responsive/
        if (str_contains($cleanPath, 'storage/packages/')) {
            $path400 = public_path("storage/packages/responsive/{$baseName}-400w.webp");
            $path800 = public_path("storage/packages/responsive/{$baseName}-800w.webp");

            $sources = [];
            if (file_exists($path400)) {
                $sources[] = asset("storage/packages/responsive/{$baseName}-400w.webp") . ' 400w';
            }
            if (file_exists($path800)) {
                $sources[] = asset("storage/packages/responsive/{$baseName}-800w.webp") . ' 800w';
            }
            if (!empty($sources)) {
                $sources[] = $optImg . ' 1200w';
                return implode(', ', $sources);
            }
        }

        return '';
    }

    /**
     * Standard responsive sizes attribute for 3-column card layouts.
     */
    public function getCardImageSizesAttribute(): string
    {
        return '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 387px';
    }
}
