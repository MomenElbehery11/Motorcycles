<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="d1">
<h1>مرحبا, {{$user->name}}</h1>
<h2>{{$user->email}}</h2>
<h2>الهاتف:     {{$user->phone}}</h2>
<h2>رقم الهوية الوطنية :    {{$user->info}}</h2>
{{-- <h2>الايصال:    {{$user->reciet}}</h2> --}}
<h1 class="a1"><a href="{{route('images.index')}}" role="button"> جميع المنتجات</a></h1>
    </div>
<h1 class="a1"><a href="{{route('prof.create',$user->id)}}" role="button"> تعديل البيانات الشخصية </a></h1>


</body>
<style>
    body{
        background: linear-gradient(to right, #00d2ff, #3a7bd5);
    }
    .d1{
        text-align: center;
    }
    a {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
    text-align: center;
}

a:hover {
    background-color: #45a049;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.a1{
text-align: center;
}
</style>
</html>
