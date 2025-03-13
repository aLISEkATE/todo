
<x-layout>
  <x-slot:title>
    {{ $todo->content }}
  </x-slot:title>
  <h1>{{ $todo->content }}</h1>
<p>Izpildīts: {{ $todo->completed ? "Jā" : "Nē" }}</p>
</ul>   
<a href="/todos/{{ $todo->id }}/edit" >Rediģēt</a>

<form name="destroy" action="{{ $todo->id }}" method="POST">
  @csrf 
  @method('DELETE')
<button>Delete</button>
  </form>
  
</x-layout>
               