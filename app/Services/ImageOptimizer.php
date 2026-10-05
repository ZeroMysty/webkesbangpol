<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageOptimizer
{
    /**
     * Optimizes and converts an uploaded image to WebP with auto-resizing.
     *
     * @param UploadedFile $file The uploaded file instance
     * @param string $destinationDir Full directory path (e.g. public_path('images/posts'))
     * @param string $baseName Base name without extension (e.g. "upacara-hut-ri_20261005")
     * @param int $maxWidth Max width in pixels (default 1280px)
     * @param int $quality WebP quality 1-100 (default 80)
     * @return string The saved filename (e.g. "upacara-hut-ri_20261005.webp")
     */
    public static function uploadAndOptimize(
        UploadedFile $file,
        string $destinationDir,
        string $baseName,
        int $maxWidth = 1280,
        int $quality = 80
    ): string {
        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        $imageName = $baseName . '.webp';
        $counter = 1;
        while (file_exists($destinationDir . DIRECTORY_SEPARATOR . $imageName)) {
            $imageName = $baseName . '-' . $counter . '.webp';
            $counter++;
        }

        $targetPath = $destinationDir . DIRECTORY_SEPARATOR . $imageName;

        // Use native PHP GD to resize and convert to WebP
        if (extension_loaded('gd') && function_exists('imagewebp')) {
            try {
                $info = @getimagesize($file->getRealPath());
                if ($info && isset($info['mime'])) {
                    $mime = $info['mime'];
                    $src = null;

                    switch ($mime) {
                        case 'image/jpeg':
                            $src = @imagecreatefromjpeg($file->getRealPath());
                            break;
                        case 'image/png':
                            $src = @imagecreatefrompng($file->getRealPath());
                            if ($src) {
                                imagepalettetotruecolor($src);
                                imagealphablending($src, true);
                                imagesavealpha($src, true);
                            }
                            break;
                        case 'image/webp':
                            $src = @imagecreatefromwebp($file->getRealPath());
                            break;
                    }

                    if ($src) {
                        $origWidth = imagesx($src);
                        $origHeight = imagesy($src);

                        // Resize if wider than maxWidth while keeping aspect ratio
                        if ($origWidth > $maxWidth) {
                            $targetWidth = $maxWidth;
                            $targetHeight = (int) round(($origHeight / $origWidth) * $maxWidth);

                            $dst = imagecreatetruecolor($targetWidth, $targetHeight);
                            imagealphablending($dst, false);
                            imagesavealpha($dst, true);

                            imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetWidth, $targetHeight, $origWidth, $origHeight);
                            imagedestroy($src);
                            $src = $dst;
                        }

                        // Save as WebP
                        imagewebp($src, $targetPath, $quality);
                        imagedestroy($src);

                        return $imageName;
                    }
                }
            } catch (\Throwable $e) {
                // Fall through to standard move
            }
        }

        // Fallback: move original file if GD processing is not available
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $fallbackName = $baseName . '.' . $ext;
        $file->move($destinationDir, $fallbackName);
        return $fallbackName;
    }
}
