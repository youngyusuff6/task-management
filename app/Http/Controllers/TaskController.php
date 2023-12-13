<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all task function with sorting mechanism
    public function index()
{
    // Fetch all tasks
    $tasks = Task::latest()->get();

    // Sort tasks by priority: high > medium > low
    $tasks = $tasks->sortBy(function ($task) {
        $priorityOrder = [
            'high' => 1,
            'medium' => 2,
            'low' => 3,
        ];

        $statusOrder = [
            'completed' => 2,
            'canceled' => 2,
        ];

        return [
            $statusOrder[$task->status] ?? 1, // Completed and canceled tasks have higher sort order
            $priorityOrder[$task->priority],
        ];
    });

    return view('all_task', compact('tasks'));
}


    //Show add task form
    public function showAddTask()
    {
        $projects = Project::all();
        return view('add_task')->with([
            'projects' => $projects
        ]);
    }

    //Send request for add task
    public function addTask(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'taskDescription' => 'string',
            'dueDate' => 'required|date|after_or_equal:today',
            'priority' => 'required|in:high,medium,low',
            'project' => 'required|exists:projects,id',
        ]);

        // Set the default status to 'pending'
        $validatedData['status'] = 'pending';

        // Save the task to the database using the create method
        Task::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['taskDescription'],
            'due_date' => $validatedData['dueDate'],
            'priority' => $validatedData['priority'],
            'project_id' => $validatedData['project'],
            'status' => $validatedData['status'],
        ]);

        // Notify with toastr
        toastr()->success('Task added successfully', 'Success');

        // Redirect or respond as needed
        return redirect()->route('all-task');
    }

    //Show edit task form
    public function showEditTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $projects = Project::all(); // You might want to refine this query based on your needs

        return view('edit_task', compact('task', 'projects'));
    }

    // Edit task request
    public function editTask(Request $request, $taskId)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'taskDescription' => 'nullable|string',
            'dueDate' => 'nullable|date',
            'priority' => 'required|in:high,medium,low',
            'status' => 'required|in:pending,in_progress,completed,canceled',
            'project' => 'required|exists:projects,id',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($taskId);

        // Update task details using the update method
        $task->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['taskDescription'],
            'due_date' => $validatedData['dueDate'],
            'priority' => $validatedData['priority'],
            'status' => $validatedData['status'],
            'project' => $validatedData['project'],
        ]);

        // Notify with toastr
        toastr()->success('Task updated successfully', 'Success');

        // Redirect or respond as needed
        return redirect()->route('all-task');
    }

    // Delete task function
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        // Success message 
        toastr()->success('Task deleted successfully', 'Success');

        return redirect()->route('all-task');
    }

    // Bonus: Add task by project dropdown
    public function tasksByProject($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = Task::where('project_id', $projectId)->get();

        return view('tasks_by_project', compact('project', 'tasks'));
    }
}
