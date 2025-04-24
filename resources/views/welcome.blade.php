
<x-layout>
  <x-slot:title>
   Welcome
  </x-slot:title>
  @guest

<a href="/login">Login</a>
<br>
<a href="/register">Register</a>
<p>Sveiks, viesi!</p>

@endguest

@auth

<form action= "/logout" method="POST">

  @csrf
 
<button type="submit">Logout</button>

</form>

<p>Sveiks, {{ Auth::user()->first_name}}</p>

@endauth


</x-layout>
               