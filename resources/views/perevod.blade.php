<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error}}</li>
        @endforeach 
      </ul>
    @endif
    <form action="{{route('perevod_to_user', $schot_id)}}" method="post">
        @csrf
       Vedite nomer telefon <input type="number" name="phone" ><br>
       Vedite summu <input type="number" name="summa" >
        <button type="submit">Perevesti summu</button>
    </form>
</body>
</html>