@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
    <div class="top-row">
        <h2 style="margin:0;">My Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-pink">+ Add Task</a>
    </div>

    <div class="card">
        @if ($tasks->isEmpty())
            <p class="empty">No tasks yet. Click "Add Task" to create your first one.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->description ?: '—' }}</td>
                            <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : '—' }}</td>
                            <td>
                                <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <form class="inline" action="{{ route('tasks.status', $task) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline btn-sm">
                                            Mark {{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}
                                        </button>
                                    </form>

                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-pink btn-sm">Edit</a>

                                    <form class="inline" action="{{ route('tasks.destroy', $task) }}" method="POST"
                                          onsubmit="return confirm('Delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection