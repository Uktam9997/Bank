<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('login_')}}" method="post">
        @csrf
       Phone <input type="tel" name="phone">
       parol <input type="password" name="password">
    <select name="bank">
        <option value="cber">cber bank</option>
        <option value="alfa">alfa bank</option>
        <option value="vtb">vtb bank</option>
    </select>
    <button type="submit">voyti</button>
    </form>
    <p>Vi esho ne zaregistrirovan ? <a href="{{route('registr')}}">Zaregistrirovatsa</a></p>
</body>
</html>