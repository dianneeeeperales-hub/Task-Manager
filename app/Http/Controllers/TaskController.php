<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View Tasks
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task form
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task
    public function store(Request $request)
    {
        $request->validate([
            'task_name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        Task::create([
            'task_name'   => $request->task_name,
            'description' => $request->description,
            'status'      => 'Pending',
            'due_date'    => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    // Show Edit Task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Edit Task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'status'      => 'required|in:Pending,Completed',
        ]);

        $task->update([
            'task_name'   => $request->task_name,
            'description' => $request->description,
            'status'      => $request->status,
            'due_date'    => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }

    // Quick toggle: Pending <-> Completed
    public function updateStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated.');
    }
}