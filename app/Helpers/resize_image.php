<?php

namespace App\Helpers;
use Exception;
use Illuminate\Support\Facades\DB;

class Dbases
{
    public static function NewResize($file, string $bucket): string
    {
        if (empty($file)) {
            throw new Exception('File is empty');
        }

        if (empty(config('image-size.' . $bucket))) {
            throw new Exception('Bucket doesnt found');
        }

        $hashname = $file->hashName();

        $original = $bucket . '/' . $hashname;
        list($width, $height) = getimagesize($file);

        $w = $width;
        $h = $height;
        if ($w > $h) {
            Image::make($file)
                ->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    storage_path(implode('/', ['app', 'public', $bucket, $hashname]))
                )
                ->destroy();
        } else {

            Image::make($file)
                ->resize(null, 1920, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    storage_path(implode('/', ['app', 'public', $bucket, $hashname]))
                )
                ->destroy();
        }

        foreach (config('image-size.' . $bucket) as $size => $dimention) {
            File::ensureDirectoryExists(storage_path(implode('/', ['app', 'public', $bucket, $size])));

            $w = $width;
            $h = $height;
            if ($w > $h) {
                Image::make($file)
                    ->resize($dimention[0], null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(
                        storage_path(implode('/', ['app', 'public', $bucket, $size, $hashname]))
                    )
                    ->destroy();
            } else {
                Image::make($file)
                    ->resize(null, $dimention[0], function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(
                        storage_path(implode('/', ['app', 'public', $bucket, $size, $hashname]))
                    )
                    ->destroy();
            }
        }
        return $original;
    }
}