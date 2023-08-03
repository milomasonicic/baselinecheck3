<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\TaskComplete;
use App\Notifications\CompletedTask;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskCompleteListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskComplete $event): void
    {
        //
        $task= $event->task;
        $user= User::find($task->user_id);

        $user->notify(new CompletedTask($task));
    }
}
