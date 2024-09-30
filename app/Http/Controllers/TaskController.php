<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Get all tasks
        $tasks = Task::all();

        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Create a new task
        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    /**
     * Display the specified task.
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json($task, 200);
    }

    /**
     * Update the specified task in storage.
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        // Update the task
        $task->update($validatedData);

        return response()->json($task, 200);
    }

    /**
     * Remove the specified task from storage.
     * @param Task $task
     * @return JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        // Delete the task
        $task->delete();

        return response()->json(null, 204);
    }
}
