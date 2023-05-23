<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Добро пожаловать:{{auth()->user()->name}}</h3>
    <a href="{{route('otkrit_schot')}}">Otkrit new schot</a><br>
    <a href="{{route('schot')}}">My Schot</a><br>
    @if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error}}</li>
        @endforeach 
      </ul>
    @endif
</body>
</html>




