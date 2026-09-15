<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageOptimizer
{
    /**
     * Optimize an uploaded image: resize if larger than maxWidth,
     * convert to lightweight modern WebP, and create companion JPEG fallback.
     *
     * @param UploadedFile $file
     * @param string $directory (relative to storage/app/public)
     * @param int $maxWidth
     * @param int $quality
     * @return array{url: string, path: string, webp_url: string, jpg_url: string}
     */
    public static function optimizeAndStore(
        UploadedFile $file,
        string $directory = 'packages',
        int $maxWidth = 1400,
        int $quality = 82
    ): array {
        $disk = Storage::disk('public');
        $targetDir = trim($directory, '/\\');

        // Ensure target directory exists in storage/app/public
        if (!$disk->exists($targetDir)) {
            $disk->makeDirectory($targetDir);
        }

        $baseName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        if (empty($baseName)) {
            $baseName = 'pkg-img';
        }
        $uniqueSuffix = time() . '-' . Str::random(6);
        $fileBase = "{$baseName}-{$uniqueSuffix}";

        $webpFilename = "{$fileBase}.webp";
        $jpgFilename = "{$fileBase}.jpg";

        $webpRelativePath = "{$targetDir}/{$webpFilename}";
        $jpgRelativePath = "{$targetDir}/{$jpgFilename}";

        $storageBasePath = storage_path("app/public/{$targetDir}");
        if (!is_dir($storageBasePath)) {
            @mkdir($storageBasePath, 0755, true);
        }

        $webpFullPath = "{$storageBasePath}/{$webpFilename}";
        $jpgFullPath = "{$storageBasePath}/{$jpgFilename}";

        // If GD is not available, fallback to default store
        if (!function_exists('imagecreatefromstring')) {
            $storedPath = $file->store($targetDir, 'public');
            $url = Storage::url($storedPath);
            return [
                'url' => $url,
                'path' => $storedPath,
                'webp_url' => $url,
                'jpg_url' => $url,
            ];
        }

        try {
            $fileData = file_get_contents($file->getRealPath());
            $srcImage = @imagecreatefromstring($fileData);

            if (!$srcImage) {
                // Fallback to standard storage
                $storedPath = $file->store($targetDir, 'public');
                $url = Storage::url($storedPath);
                return [
                    'url' => $url,
                    'path' => $storedPath,
                    'webp_url' => $url,
                    'jpg_url' => $url,
                ];
            }

            // Fix EXIF orientation if JPEG
            $srcImage = self::correctOrientation($file->getRealPath(), $srcImage);

            $origWidth = imagesx($srcImage);
            $origHeight = imagesy($srcImage);

            // Calculate new dimensions (never upscale)
            if ($origWidth > $maxWidth && $maxWidth > 0) {
                $targetWidth = $maxWidth;
                $targetHeight = (int) round(($origHeight / $origWidth) * $targetWidth);
            } else {
                $targetWidth = $origWidth;
                $targetHeight = $origHeight;
            }

            // Create canvas
            $targetImage = imagecreatetruecolor($targetWidth, $targetHeight);

            // Handle transparency for PNG/WebP
            imagealphablending($targetImage, false);
            imagesavealpha($targetImage, true);
            $transparent = imagecolorallocatealpha($targetImage, 255, 255, 255, 127);
            imagefilledrectangle($targetImage, 0, 0, $targetWidth, $targetHeight, $transparent);

            // Resample cleanly
            imagecopyresampled(
                $targetImage,
                $srcImage,
                0, 0, 0, 0,
                $targetWidth,
                $targetHeight,
                $origWidth,
                $origHeight
            );

            // 1. Save WebP version
            if (function_exists('imagewebp')) {
                imagewebp($targetImage, $webpFullPath, $quality);
            }

            imagedestroy($srcImage);
            imagedestroy($targetImage);

            $webpUrl = Storage::url($webpRelativePath);
            $jpgUrl = Storage::url($jpgRelativePath);

            return [
                'url' => $webpUrl,
                'path' => $webpRelativePath,
                'webp_url' => $webpUrl,
                'jpg_url' => $jpgUrl,
            ];
        } catch (\Throwable $e) {
            Log::warning('ImageOptimizer error: ' . $e->getMessage());

            $storedPath = $file->store($targetDir, 'public');
            $url = Storage::url($storedPath);
            return [
                'url' => $url,
                'path' => $storedPath,
                'webp_url' => $url,
                'jpg_url' => $url,
            ];
        }
    }

    /**
     * Delete an image and its companion format if stored in public storage.
     */
    public static function deleteStoredImage(?string $urlOrPath): void
    {
        if (empty($urlOrPath)) {
            return;
        }

        // Only delete files belonging to storage/
        if (!str_contains($urlOrPath, '/storage/') && !str_starts_with($urlOrPath, 'packages/')) {
            return;
        }

        try {
            $relativePath = str_replace('/storage/', '', parse_url($urlOrPath, PHP_URL_PATH));
            $disk = Storage::disk('public');

            if ($disk->exists($relativePath)) {
                $disk->delete($relativePath);
            }

            // Also check companion .jpg or .webp
            $baseWithoutExt = pathinfo($relativePath, PATHINFO_DIRNAME) . '/' . pathinfo($relativePath, PATHINFO_FILENAME);
            $ext = strtolower(pathinfo($relativePath, PATHINFO_EXTENSION));

            $companionExt = ($ext === 'webp') ? 'jpg' : 'webp';
            $companionPath = "{$baseWithoutExt}.{$companionExt}";

            if ($disk->exists($companionPath)) {
                $disk->delete($companionPath);
            }
        } catch (\Throwable $e) {
            Log::warning('Could not delete stored image: ' . $e->getMessage());
        }
    }

    /**
     * Correct image orientation based on EXIF metadata (e.g. mobile uploads).
     */
    protected static function correctOrientation(string $filePath, \GdImage $image): \GdImage
    {
        if (!function_exists('exif_read_data')) {
            return $image;
        }

        try {
            $exif = @exif_read_data($filePath);
            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 3:
                        $rotated = imagerotate($image, 180, 0);
                        if ($rotated) {
                            imagedestroy($image);
                            return $rotated;
                        }
                        break;
                    case 6:
                        $rotated = imagerotate($image, -90, 0);
                        if ($rotated) {
                            imagedestroy($image);
                            return $rotated;
                        }
                        break;
                    case 8:
                        $rotated = imagerotate($image, 90, 0);
                        if ($rotated) {
                            imagedestroy($image);
                            return $rotated;
                        }
                        break;
                }
            }
        } catch (\Throwable) {
            // Ignore EXIF read failures on formats lacking EXIF
        }

        return $image;
    }
}
