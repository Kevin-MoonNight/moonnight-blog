<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public static function getAvatars()
    {
        $s3 = Storage::disk('s3');
        $filePath = $s3->allFiles('/avatars');

        return collect($filePath)->map(function ($path) use ($s3) {
            return $s3->url($path);
        });
    }

    /**
     *
     * @param $image
     * @return string
     */
    public function create($image)
    {
        $resizeImage = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60)->stream()->detach();

        $imagePath = 'images/' . uniqid(date('YmdHis')) . '_' . preg_replace('/\\.[^.\\s]{3,4}$/', '', $image->getClientOriginalName()) . '.jpg';

        $s3 = Storage::disk('s3');
        $s3->put($imagePath, $resizeImage);

        return $s3->url($imagePath);
    }

    /**
     * delete image
     *
     * @return boolean
     */
    public function destroy($imageUrl)
    {
        $imagePath = parse_url($imageUrl);
        return Storage::disk('s3')->delete($imagePath);
    }
}
