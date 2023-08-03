<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Events\TaskComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    //

    public function update(Task $task)
    {
        $task->update([
            "completed_at"=>now()
        ]);

        event(new TaskComplete($task));

        return Redirect::back();
    }
}
