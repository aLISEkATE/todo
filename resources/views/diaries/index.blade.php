<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Dienasgrāmata</title>
</head>
<body> 
<x-navigation></x-navigation>
<ul>

  @foreach ($diaries as $diary)
    <li><a href="diaries/{{ $diary->id }}">{{ $diary->title }}<a/></li>
  @endforeach
  
</ul>     
</body>
</html>