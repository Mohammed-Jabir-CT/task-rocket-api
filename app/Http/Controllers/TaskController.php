<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Auth::user()->tasks;

        return response()->json([
            'status' => 'Success',
            'tasks' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date|after_or_equal:today',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = Auth::id();
        $task->due_date = $request->due_date;
        $task->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully added task!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        Gate::authorize('update', $task);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'due_date' => 'sometimes|nullable|date|after_or_equal:today',
            'status' => 'sometimes|nullable|integer|in:0,1',
        ]);

        if ($request->filled('title')) {
            $task->title = $request->title;
        }
        if ($request->filled('description')) {
            $task->description = $request->description;
        }
        if ($request->filled('due_date')) {
            $task->due_date = $request->due_date;
        }
        if ($request->filled('status')) {
            $task->status = $request->status;
        }

        $task->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully updated task!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully deleted task!',
        ]);
    }
}
