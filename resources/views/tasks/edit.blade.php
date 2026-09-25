@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="top-row">
        <h2 style="margin:0;">Edit Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline">Back</a>
    </div>

    <div class="card">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}">

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button type="submit" class="btn btn-pink">Update Task</button>
        </form>
    </div>
@endsection