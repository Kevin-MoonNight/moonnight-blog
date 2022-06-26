<?php

namespace Tests\Feature\Controller;

use App\Mail\Contacted;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
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

        $this->post(route('messages.store'), $message->toArray())
            ->assertRedirect(route('contact'));

        Mail::assertSent(Contacted::class);

        $this->assertDatabaseCount('messages', 1);
    }

    public function test_message_can_not_created()
    {
        $this->post(route('messages.store'), [])
            ->assertInvalid(['name', 'email', 'type']);

        Mail::assertNothingSent();
    }
}
