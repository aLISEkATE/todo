<x-layout>
  <x-slot:title>
    {{ $todo->content }}
  </x-slot:title>
  <form action="/todos/{{ $todo->id }}" method="POST">
    @csrf
    <label> 
        <input value="{{ old('content', $todo->content) }}" name="content">  
    </label> 

    <label>
        Izpildīts:
        <input name="completed" type="hidden" value="0"> 
        <input name="completed" type="checkbox" value="1" 
               {{ old('completed', $todo->completed) ? 'checked' : '' }}>   
    </label>

    @error("completed")
        <p>{{ $message }}</p>
    @enderror
    @error("content")
        <p>{{ $message }}</p>
    @enderror

    <button>Rediģēt</button>
</form>

</x-layout>
               