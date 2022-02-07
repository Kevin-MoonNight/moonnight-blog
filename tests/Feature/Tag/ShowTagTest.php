<?php

namespace Tests\Feature\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_show()
    {
        $this->assertTrue(true);
    }
}
