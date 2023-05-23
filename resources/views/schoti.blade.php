<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($userID)
            @foreach($userID as $user_cur)
            <h4>Na vashem schotu {{$user_cur->summa}} {{$user_cur->currency}}</h4>
            @endforeach
     @endif
    <form action="{{route('action_order')}}" method="post">
        @csrf
        <select name="order">
        @if($userID)
            @foreach($userID as $user_cur)
            <option value="{{$user_cur->id}}">MySchot {{$user_cur->summa}}  {{$user_cur->currency}}</option>
            @endforeach
        @endif
        </select>
        <select name="orderAction">
            <option value="perevod">perevesti po nomeru</option>
            <option value="editSchot">popolnit schot</option>
            <option value="edit">snimat nalichku</option>
            <option value="destroy">udalit schot</option>
            <option value="convertForm">convertirovat</option>
        </select>
        <button type="submit">Otkrit</button>
    </form>
    @if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error}}</li>
        @endforeach 
      </ul>
    @endif
</body>
</html>