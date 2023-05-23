<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('add_schot')}}" method="post">
        @csrf
            Vedite summa <input type="number" name="summa">
        <select name="currency">
            <option value="usd">USD $</option>
            <option value="eur">EUR €</option>
            <option value="rub">RUB ₽</option>
        </select>
          <button type="submit">Otkrit schot</button>
    </form>
</body>
</html>