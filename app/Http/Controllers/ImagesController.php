<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;

class ImagesController extends Controller
{
    public static function getAvatars(): Collection
    {
        $s3 = Storage::disk('s3');
        $filePath = $s3->allFiles('/avatars');

        return collect($filePath)->map(function ($path) use ($s3) {
            return $s3->url($path);
        });
    }

    public static function getS3Url(string $path): string
    {
        $s3 = Storage::disk('s3');

        return $s3->url($path);
    }

    public static function getRandomCatImageUrl(): string
    {
        try{
            $response = Http::get('https://api.thecatapi.com/v1/images/search');

            return $response->json()[0]['url'];
        }catch (\ErrorException $exception){
            return 'https://cdn2.thecatapi.com/images/bb7.jpg';
        }
    }

    public static function generateRandomFileName(): string
    {
        return uniqid(date('YmdHis'));
    }

    private static function resizeImage(UploadedFile $image)
    {
        return Image::make($image)->resize(640, 360, function ($constraint) {
            $constraint->aspectRatio('16:9');
        })->encode('jpg', 60)->stream()->detach();
    }

    public static function create(UploadedFile $image, string $directory = null)
    {
        $imagePath = $directory ? $directory . '/' : "" . self::generateRandomFileName();

        $s3 = Storage::disk('s3');

        $s3->put($imagePath, self::resizeImage($image));

        return $s3->url($imagePath);
    }

    public static function destroy($imageUrl)
    {
        return Storage::disk('s3')->delete(parse_url($imageUrl));
    }

    public static function clearUnusedImages()
    {
        $existImages = Article::pluck('thumbnail');
        self::deleteImages('/articles', $existImages);

        $existImages = Product::pluck('thumbnail');
        self::deleteImages('/products', $existImages);
    }

    private static function deleteImages(string $directory, Collection $existImages)
    {
        $s3 = Storage::disk('s3');
        $filePath = $s3->allFiles($directory);

        collect($filePath)->map(function ($path) use ($existImages, $s3) {
            $url = $s3->url($path);

            if ($existImages->search($url) === false) {
                self::destroy($url);
            }
        });
    }
}
