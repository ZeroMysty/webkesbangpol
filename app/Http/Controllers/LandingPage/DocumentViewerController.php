<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\JsonResponse;

class DocumentViewerController extends Controller
{
    /**
     * Whitelist of allowed document subdirectories.
     */
    protected array $allowedDirectories = [
        'renja',
        'renstra',
        'iku',
        'ukurkerja',
        'lakip',
        'laporankajian',
    ];

    /**
     * Serve a document file securely from public/document/{directory}/{filename}.
     */
    public function serve(Request $request, string $directory, string $filename): BinaryFileResponse|JsonResponse
    {
        // Sanitize path components to prevent directory traversal
        $directory = basename($directory);
        $filename = basename($filename);

        if (!in_array($directory, $this->allowedDirectories, true)) {
            return response()->json(['error' => 'Invalid document category'], 403);
        }

        $path = public_path('document' . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $filename);

        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found', 'path' => $path], 404);
        }

        $mime = mime_content_type($path) ?: 'application/octet-stream';

        if ($request->has('encode')) {
            $content = base64_encode(file_get_contents($path));
            return response()->json([
                'filename' => $filename,
                'content' => $content,
                'mime' => $mime,
            ]);
        }

        return response()->file($path, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    public function renja(Request $request, string $filename)
    {
        return $this->serve($request, 'renja', $filename);
    }

    public function renstra(Request $request, string $filename)
    {
        return $this->serve($request, 'renstra', $filename);
    }

    public function iku(Request $request, string $filename)
    {
        return $this->serve($request, 'iku', $filename);
    }

    public function ukurkerja(Request $request, string $filename)
    {
        return $this->serve($request, 'ukurkerja', $filename);
    }

    public function lakip(Request $request, string $filename)
    {
        return $this->serve($request, 'lakip', $filename);
    }

    public function laporankajian(Request $request, string $filename)
    {
        return $this->serve($request, 'laporankajian', $filename);
    }
}
