<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('registr')}}" method="post">
        @csrf
       F.I.O <input type="text" name="name">
       Phone <input type="tel" name="phone">
       email <input type="email" name="email">
       parol <input type="password" name="password">
    <select name="bank">
        <option value="cber">cber bank</option>
        <option value="alfa">alfa bank</option>
        <option value="vtb">vtb bank</option>
    </select>
    <button type="submit">Zaregistrirovatsa</button>
    </form>
    <p>Vi uje zaregistrirovan ? <a href="{{route('vxod')}}">Voyti v accaunt</a></p>

   
</body>
</html>



