<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ToDo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ToDoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $todos = ToDo::all(); // Global scope ensures only the user's records are retrieved
        return view("todos.index", compact("todos"));
    }

    public function show(ToDo $todo)
    {
        $this->authorize('view', $todo);
        return view('todos.show', compact('todo'));
    }

    public function create(ToDo $create) 
    {
        return view("todos.create.create", compact("create"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "completed" => ["required", "boolean"],
        ]);

        ToDo::create([
            "content" => $validated["content"],
            "completed" => $validated["completed"],
            "user_id" => Auth::id(), // Set the user_id to the authenticated user's ID
        ]);

        return redirect()->route('todos.index')->with('success', 'To-Do created successfully!');
    }

    public function update(Request $request, ToDo $todo)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "completed" => ["required", "boolean"]
        ]);

        $todo->content = $validated["content"];
        $todo->completed = $validated["completed"];

        $todo->save();
        return redirect("/todos/" . $todo->id);
    }

    public function edit(ToDo $todo) 
    {
        return view("todos.edit.edit", compact("todo"));
    }

    public function destroy(ToDo $todo) 
    {
      $todo->delete();
      return redirect("/todos");
    }
    
}
