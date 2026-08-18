<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UploadedStorageController extends Controller
{
    public function show(string $path): BinaryFileResponse
    {
        $path = str_replace('\\', '/', ltrim($path, '/'));

        abort_if($path === '' || str_contains($path, '..'), Response::HTTP_NOT_FOUND);
        abort_unless(preg_match('#^(homepage|categories|offers|qrcodes|advertisers)/#', $path), Response::HTTP_NOT_FOUND);

        $fullPath = storage_path('app/public/'.$path);

        abort_unless(is_file($fullPath), Response::HTTP_NOT_FOUND);

        return response()->file($fullPath);
    }
}
