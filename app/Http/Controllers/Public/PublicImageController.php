<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PublicImageController extends Controller
{
    public function show(string $path): BinaryFileResponse
    {
        $path = str_replace('\\', '/', ltrim($path, '/'));

        abort_if($path === '' || str_contains($path, '..'), Response::HTTP_NOT_FOUND);

        $fullPath = public_path('images/'.$path);

        abort_unless(is_file($fullPath), Response::HTTP_NOT_FOUND);

        return response()->file($fullPath);
    }
}
