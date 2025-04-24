<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;
class DiaryController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $diaries = Diary::all(); // Global scope ensures only the user's diaries are retrieved
        return view("diaries.index", compact("diaries"));
    }
    public function create(Diary $create) {
        return view("diaries.create.create", compact("create"));
      }
    public function show(Diary $diary) {
        $this->authorize('view', $diary); // Ensure the user can view this diary
        return view("diaries.show", compact("diary"));
      }
      public function store(Request $request){
        
        $validated = $request->validate([
            "title" => ["required", "max:20"],
            "body" => ["required", "max:255"],
            'date' => ['required', Rule::date()->format('Y-m-d')]
          ]);
Diary::create([
    "title" => $validated["title"],
    "body" => $validated["body"],
    "date" => $validated["date"],
    "user_id" => Auth::id(), // Assign the authenticated user's ID
  ]);
  return redirect("/diaries");  
      }

      public function update(Request $request, Diary $diary){
        
        $validated = $request->validate([
            "title" => ["required", "max:20"],
            "body" => ["required", "max:255"],
            'date' => ['required', Rule::date()->format('Y-m-d')]
          ]);

    $diary->title = $validated["title"];
    $diary->body = $validated["body"];
    $diary->date = $validated["date"];

$diary->save();
return redirect("/diaries/". $diary-> id);
      }
      public function edit(Diary $diary) {
        return view("diaries.edit.edit", compact("diary"));
        
    }
    public function destroy(Diary $diary) 
    {
      $diary->delete();
      return redirect("/diaries");
    }
    
}