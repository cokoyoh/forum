<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guest_may_not_add_thread_to_forum()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = make(Thread::class);

        $this->post('/threads', $thread->toArray());

    }

    /** @test */
     function an_authenticated_user_can_create_new_forum_threads()
     {
         $this->signIn();

         $thread = make(Thread::class);

         $this->post('/threads', $thread->toArray());

         $this->get($thread->path())
             ->assertSee($thread->title)
             ->assertSee($thread->body);
     }
}
