<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Console\Commands\CompletedTasksCount;

class CompletedTasksCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:completed-tasks-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $users= User::whereHas("tasks", function($query){
                $query-> whereNotNull('completed_at');
        })->get();

        foreach($users as $user)
        {
            $this->info("User:{$user->name}, Tasks from user: {$user->tasks}");
            $tasks=$user->tasks;
            $user->notify( new CompletedTasksCount($tasks));
        }
    }
}
