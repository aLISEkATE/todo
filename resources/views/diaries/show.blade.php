
<x-layout>
  <x-slot:title>
    {{ $diary->title}}
  </x-slot:title>
  <h1>{{ $diary->title }}</h1>
  <p>{{ $diary->body }}</p>
  <a href="/diaries/{{ $diary->id }}/edit" >Rediģēt</a>

<form name="destroy" action="{{ $diary->id }}" method="POST">
  @csrf 
  @method('DELETE')
<button>Delete</button>
  </form>
  
</x-layout>
               