<?php

namespace App\Utils;
use illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageUpload
{



    public static function uploadImage($file, $height = null, $width = null, $path = null)
    {
        if ($file instanceof UploadedFile) {
            $imageName = Str::uuid() . date('Y-m-d') . '.' . $file->extension();
            [$defaultWidth, $defaultHeight] = getimagesize($file);
            $height = $height ?? $defaultHeight;
            $width = $width ?? $defaultWidth;
            $image = Image::make($file->path());
            $image->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            })->stream();
            Storage::disk('images')->put($imageName.$path, $image);
            return $path.$imageName;
        }
    }

}
