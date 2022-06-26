<?php

namespace Tests\Feature\Controller;

use App\Http\Controllers\ImagesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImagesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('s3');
    }

    public function test_image_can_created()
    {
        $url = ImagesController::create(UploadedFile::fake()->image('test.jpg'));
        $path = str_replace('/storage', '', $url);

        Storage::disk('s3')->assertExists($path);
    }

    public function test_image_can_deleted()
    {
        $url = ImagesController::create(UploadedFile::fake()->image('test.jpg'));
        $path = str_replace('/storage', '', $url);
        ImagesController::destroy($path);

        Storage::disk('s3')->assertMissing($path);
    }

    public function test_random_cat_image_url_can_get()
    {
        $this->get(ImagesController::getRandomCatImageUrl())
            ->assertOk();
    }
}
