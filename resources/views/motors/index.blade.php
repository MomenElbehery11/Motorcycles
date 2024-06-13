<!-- resources/views/images/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Image Gallery</h1>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <p class="card-text">Price: ${{ $image->price }}</p>
                            <form action="{{ route('images.purchase', $image->id , $image->quantity) }}" method="POST">
                                @csrf
                                <label for="quantity">Quantity:</label><br>
                                <input type="number" name="quantity" min="1" required><br><br>
                                <button type="submit" class="btn btn-primary">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h1 class="a1"><a href="{{route('images.create')}}" role="button">  اضف منتج جديد</a></h1>
<h1 class="d2"><a href="{{route('prof.index',1)}}" role="button">الصفحة الشخصية</a></h1>
</body>
<style>
    .a1{
        color: blue;
    }
    .a2{
        color: brown;
    }
</style>
</html>
