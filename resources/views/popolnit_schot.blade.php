<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($schot)
    <h3>Na vashem schotu:{{$schot->summa}} {{$schot->currency}}</h3>
        <form action="{{route('popolnit_schot', $schot->id)}}" method="post">
            @csrf
            Vedite summa <input type="number" name="summa">
            <button type="submit">Popolnit Schot</button>
    @endif
        </form>
</body>
</html>