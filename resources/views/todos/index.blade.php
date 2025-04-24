<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Veicamie uzdevumi</title>
</head>

<body>

@auth
<x-navigation></x-navigation>
@endauth
<h1>Visi veicamie uzdevumi</h1>  
<ul>

  @foreach ($todos as $todo)
    <li><a href="todos/{{ $todo->id }}">{{ $todo->content }}<a></li>
  @endforeach


</body>
</html>