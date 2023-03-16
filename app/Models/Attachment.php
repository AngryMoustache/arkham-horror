<?php

namespace App\Models;

use AngryMoustache\Media\Models\Attachment as ModelsAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attachment extends ModelsAttachment
{
    public static function uploadFromUrl($url)
    {
        $filename = Str::of($url)->before('?')->afterLast('/');
        [$name, $extension] = $filename->explode('.');

        $attachment = self::firstOrCreate([
            'original_name' => $filename,
            'alt_name' => $name,
            'extension' => $extension,
            'folder_location' => 'cards',
        ], [
            'disk' => config('media.default-disk', 'public'),
        ]);

        // Avoid saving the image again if we already have it
        if (! $attachment->wasRecentlyCreated) {
           return $attachment;
        }

        // Save the image
        $folder = "public/attachments/{$attachment->id}";
        Storage::putFileAs($folder, $url, $filename);

        // Generate thumb format
        $attachment->format('thumb');

        // Fill in some extra data
        $filesize = getimagesize(Storage::path("{$folder}/{$filename}"));
        $response = Storage::response("${folder}/{$filename}");

        $attachment->size = $response->headers->get('content-length');
        $attachment->mime_type = $filesize['mime'];
        $attachment->width = $filesize[0];
        $attachment->height = $filesize[1];
        $attachment->saveQuietly();

        return $attachment;
    }
}
