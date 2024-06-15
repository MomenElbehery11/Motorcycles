<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="btn border-animate">
<h1>Only Admin Is Allowed To This Page</h1>
</body>
<style>
    body{
        background: linear-gradient(to right, #000000, #434343);

    }
    .btn.border-animate {
    background: #fff;
    border: 2px solid #ff7e5f;
    color: #ff7e5f;
    position: relative;
    overflow: hidden;
}

.btn.border-animate::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #ff7e5f;
    z-index: -1;
    transition: all 0.3s ease;
    transform: scaleX(0);
    transform-origin: left;
}

.btn.border-animate:hover::before {
    transform: scaleX(1);
}

.btn.border-animate:hover {
    color: #fff;
}
</style>
</html>
