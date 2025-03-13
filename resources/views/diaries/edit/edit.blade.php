<x-layout>
  <x-slot:title>
    {{ $diary->title }}
  </x-slot:title>
  <form action="/diaries/{{ $diary->id }}" method="POST">
    @csrf
  

<label> 
<input value="{{ old('title', $diary->title) }}" name="title">  
</label> 

<label> 
<textarea name="body">{{ old('body', $diary->body) }}</textarea>  
</label> 

<label> 
<input type="date" value="{{ old('date', $diary->date) }}" name="date">  
</label> 

    @error("title")
        <p>{{ $message }}</p>
    @enderror

    @error("body")
        <p>{{ $message }}</p>
    @enderror

    @error("date")
        <p>{{ $message }}</p>
    @enderror

    <button>Rediģēt</button>
</form>

</x-layout>
               