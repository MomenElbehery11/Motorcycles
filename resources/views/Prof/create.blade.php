<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('prof.store',$user->id) }}" method="POST">

        @csrf
        <label for="name">ادخل اسمك بالكامل :</label>
        <input type="text" name="name" required>

        <label for="phone">ادخل هاتفك:</label>
        <input type="string" name="phone" required>

        <label for="info">ادخل رقم الهوية:</label>
        <input type="string" name="info" required>


        <button type="submit">Upload</button>
    </form>
    <style>
body{
    background-color: #33FFBD;
}
        input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s;
}

input:focus {
    border-color: #4CAF50;
}
    </style>
</body>
</html>
