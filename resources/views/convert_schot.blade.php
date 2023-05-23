<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('convert_action', $convert->id)}}" method="post">
        @csrf
        <input type="number" disabled value="{{$convert->summa}}" name="summa">
        @if($convert->currency != 'rub')
        <select name="currency">
            <option value="rub">RUB</option>
        </select>
        @else
            <select name="currency">
                <option value="eur">EUR</option>
                <option value="usd">USD</option>
            </select>
        @endif
        <button type="submit">convertirovat</button>
    </form>
</body>
</html>