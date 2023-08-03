<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <table>

            <th>
                title
            </th>

            <th>
                description
            </th>

            <th>
                user
            </th>

            <th>
                complete
            </th>

            <th>
                completed_at 
            </th>
            @foreach ($tasks as $task)

            <tr>
                <td>
                    {{$task->title}}            
                </td>

                <td>
                    {{Str::limit($task->description, 50)}}            
                </td>

                <td>
                    {{$task->user->name}}            
                </td>

                <td>
                    <form action="{{route("task.update", ["task"=>$task->id])}}" method="post">
                        @csrf
                        <input type="checkbox" name="completed_at">
                        <button type="submit" hidden>Complete</button>
                    </form>
                </td>

                <td>
                    {{$task->completed_at}}  
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
