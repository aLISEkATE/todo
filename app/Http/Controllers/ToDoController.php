<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = ToDo::all();
        return view("todos.index", compact("todos"));
    }

    public function show(ToDo $todo) 
    {
        return view("todos.show", compact("todo"));
    }

    public function create(ToDo $create) 
    {
        return view("todos.create.create", compact("create"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "completed" => ["required"]
        ]);

        ToDo::create([
            "content" => $request->content,
            "completed" => $request->completed
        ]);

        return redirect("/todos");
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
