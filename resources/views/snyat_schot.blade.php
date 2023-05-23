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
    @if($snyat_summa)
        <h3>Na vashem schotu:{{$snyat_summa->summa}} {{$snyat_summa->currency}}</h3>
    <form action="{{route('izmenit_schot', $snyat_summa->id)}}" method="post">
        @csrf
            Vedite summa <input type="number" name="summa">
        <button type="submit">Snyat nalichku</button>
    @endif
    </form>
</body>
</html>



