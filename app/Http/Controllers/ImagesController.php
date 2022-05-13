<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $response = Http::get('https://api.thecatapi.com/v1/images/search');

        return $response->json()[0]['url'];
    }

    public static function generateRandomFileName(): string
    {
        return uniqid(date('YmdHis'));
    }

    public static function resizeImage(UploadedFile $image)
    {
        return Image::make($image)->resize(640, 360, function ($constraint) {
            $constraint->aspectRatio('16:9');
        })->encode('jpg', 60)->stream()->detach();
    }

    public static function create(string $directory, UploadedFile $image)
    {
        $imagePath = $directory . '/' . self::generateRandomFileName();

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
