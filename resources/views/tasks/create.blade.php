@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <div class="top-row">
        <h2 style="margin:0;">Add Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline">Back</a>
    </div>

    <div class="card">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">

            <button type="submit" class="btn btn-pink">Save Task</button>
        </form>
    </div>
@endsection