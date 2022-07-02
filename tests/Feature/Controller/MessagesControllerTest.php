<?php

namespace Tests\Feature\Controller;

use App\Mail\Contacted;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
use Tests\CaptchaFake;
use Tests\TestCase;

class MessagesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
    }

    public function test_message_can_be_created()
    {
        $message = Message::factory()->make();
        $message->email = "test@gmail.com";

        $message['captcha'] = "123456";
        CaptchaFake::fake('123456');

        $this->post(route('messages.store'), $message->toArray())
            ->assertRedirect(route('contact'));

        Mail::assertSent(Contacted::class);

        $this->assertDatabaseCount('messages', 1);
    }

    public function test_message_can_not_created()
    {
        CaptchaFake::fake('123456');

        $this->post(route('messages.store'), ['captcha' => '654321'])
            ->assertInvalid(['name', 'email', 'type', 'captcha']);

        Mail::assertNothingSent();
    }
}
