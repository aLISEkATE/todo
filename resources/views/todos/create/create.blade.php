<x-layout>
<x-slot:title>Izveidot ierakstu</x-slot:title>
<h1>Izveidot bloga ierakstu</h1>

<form action="/todos" method="POST">
@csrf
  <input name="content" />
 <label> Jā <input type="radio" name="completed" value="1">  </label> 
 <label> Nē <input type="radio" name="completed" value="0">   </label> 
  @error("content")
  <p>{{ $message }}</p>
@enderror
  <button>Saglabāt</button>
</form>
</x-layout>
               