<?php

namespace App\Support;

use Illuminate\Support\Str;

class PublicStorageUrl
{
    public static function for(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return route('public.uploaded-storage', ['path' => ltrim($path, '/')]);
    }
}
