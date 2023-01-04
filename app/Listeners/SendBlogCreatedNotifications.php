<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use App\Models\User;
use App\Notifications\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBlogCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BlogCreated  $event
     * @return void
     */
    public function handle(BlogCreated $event)
    {
        foreach (User::whereNot('id', $event->blog->user_id)->cursor() as $user) {
            $user->notify(new NewPost($event->blog));
        }
    }
}
