<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>مرحبا {{$user->FullName}}</h1>
<h2>{{$user->email}}</h2>
<h2>{{$user->phone}}</h2>
<h2>{{$user->info}}</h2>
<h1 class="a1"><a href="{{route('images.index')}}" role="button"> جميع المنتجات</a></h1>

</body>
</html>
