<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d1">
    <h1>المبلغ النهائي : {{$image->total}} ريال سعودي</h1>
    <h1>الايصال : {{$image->reciet}}</h1>
    <h1></h1>
</div>
<a href="{{route('images.index')}}" class="button-float">جميع الدراجات النارية</a>

</body>
<style>
    body{
        background: linear-gradient(to right, #f6d365, #fda085);
    }
    .d1{
        text-align: center;
    }
    .button-float {
  display: inline-block;
  padding: 10px 20px;
  background-color: #03a9f4;
  color: white;
  text-align: center;
  text-decoration: none;
  border: 2px solid transparent;
  border-radius: 5px;
  transition: transform 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.button-float::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 300%;
  height: 300%;
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  z-index: 0;
  transition: width 0.3s ease, height 0.3s ease;
}

.button-float:hover {
  background-color: #0288d1;
  border-color: #0288d1;
}

.button-float:hover::before {
  width: 0;
  height: 0;
}
</style>
</html>
