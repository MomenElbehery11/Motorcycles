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
        <label for="phone">Enter Your Phone:</label>
        <input type="string" name="phone" required>

        <label for="info">Enter Your ID:</label>
        <input type="string" name="info" required>

        <label for="FullName">Enter Your FullName:</label>
        <input type="text" name="FullName" required>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
