<!-- resources/views/images/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع الدراجات النارية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
<script></script>
</head>
<body>
    <div class="container mt-5">
        <h1>جميع الدراجات النارية</h1>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $image->path) }}" width="400" height="400" class="d1" alt="Image">
                        <div class="card-body">
                            <h2 class="card-text">السعر : ريال سعودي{{ $image->price }}</h2>
                            <form action="{{ route('images.purchase', $image->id , $image->quantity) }}" method="POST">
                                @csrf
                                <label for="quantity">Quantity:</label><br>
                                <input type="number" name="quantity" min="1" required class="styled-input"><br><br>
                                <button type="submit" class="btn text-animate">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h1 class="a1"><a href="{{route('images.create')}}" class="button-red-outline" role="button">  اضف منتج جديد</a></h1>
<h1 class="d2"><a href="{{route('prof.index',auth()->user()->id)}}" role="button"class="button-red-outline ">الصفحة الشخصية</a></h1>
</body>
<style>
    .a1{
        color: blue;
    }
    .a2{
        color: brown;
    }
    .a3{
        text-decoration: none;
    }
    body{
        background: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%);
    }
    .d1{
    border-radius:20%;
    }
    .d1:hover{
    transform: scale(1.1);
    transition: 0.9s;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    transform: scale(1.1);
}
.styled-input {
    width: 200px;
    padding: 10px;
    border: 2px solid #fff;
    border-radius: 5px;
    font-size: 1em;
    color: #333;
    background-color: #fff;
    outline: none;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.styled-input:focus {
    border-color: #ff7e5f;
    box-shadow: 0 0 10px rgba(255, 126, 95, 0.5);
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
    color: #fff;
}
.btn.hover-animate {
    background: #ff7e5f;
    color: #fff;
    position: relative;
    overflow: hidden;
}

.btn.hover-animate::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 300%;
    height: 100%;
    background: rgba(255, 255, 255, 0.15);
    transform: translateX(-50%) rotate(45deg);
    transition: all 0.75s;
}

.btn.hover-animate:hover::before {
    left: -50%;
    transform: translateX(50%) rotate(45deg);
}

/* Border Animate Button */
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

/* Text Animate Button */
.btn.text-animate {
    background: #ff7e5f;
    color: #fff;
    overflow: hidden;
    position: relative;
}

.btn.text-animate span {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    transition: top 0.3s ease;
}

.btn.text-animate:hover span {
    top: 50%;
    transform: translate(-50%, -50%);
}
.button-red-outline {
  display: inline-block;
  padding: 10px 20px;
  color: #e91e63;
  text-align: center;
  text-decoration: none;
  border: 2px solid #e91e63;
  border-radius: 5px;
  transition: color 0.3s, border-color 0.3s;
  cursor: pointer;
}

.button-red-outline:hover {
  color: white;
  background-color: #e91e63;
  border-color: #e91e63;
}
@media all and (max-width:500px){
    
}

</style>
</html>
