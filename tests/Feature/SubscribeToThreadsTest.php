<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SubscribeToThreadsTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function a_user_can_subscribe_to_a_thread()
    {
        $this->signIn();

        $thread = create(Thread::class);

        $this->post($thread->path() . '/subscribe');

        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => 'Some reply body here',
        ]);

        //leave a notification after a reply is left
//        $this->assertCount(1, auth()->user()->notifications);
    }
}