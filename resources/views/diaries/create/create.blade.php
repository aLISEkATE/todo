<x-layout>
<x-slot:title>Izveidot ierakstu</x-slot:title>
<h1>Izveidot bloga ierakstu</h1>

<form action="/diaries" method="POST">

@csrf
  <input placeholder="title" name="title" />
  <textarea placeholder="body" name="body" /></textarea>
  <input type="date" name="date" />

  @error("title")
  <p>{{ $message }}</p>
@enderror
@error("body")
  <p>{{ $message }}</p>
@enderror
@error("date")
  <p>{{ $message }}</p>
@enderror
  <button>Saglabāt</button>
</form>
</x-layout>
               