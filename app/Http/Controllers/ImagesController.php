<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    /**
     *
     * @param $image
     * @return string
     */
    public function create($image)
    {
        $imagePath = "storage/" . $image->store('thumbnail');

        $resizeImage = Image::make(public_path($imagePath))->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $resizeImage->save(public_path($imagePath), 60);
        $resizeImage->save();

        return $imagePath;
    }

    /**
     * delete image
     *
     * @return boolean
     */
    public function destroy($thumbnailPath)
    {
        return Storage::delete(Str::of($thumbnailPath)->remove('storage/'));
    }
}
