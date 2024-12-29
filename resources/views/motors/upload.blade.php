<!-- resources/views/upload.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Select an image:</label>
        <input type="file" name="image" id="image" required>

        
        <label for="price">price:</label>
        <input type="number" name="price" required><br><br>


        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Images</h2>
    @foreach ($images as $image)
        <div>
            <img src="{{ asset('storage/' . $image->path) }}" class="d1"  width="250" height="250" alt="Uploaded Image">
            <h2>{{$image->price}} ريال سعودي</h2>
        </div>
    @endforeach
    <a href="{{route('images.index')}}" class="button-3d">جميع الدراجات النارية</a>
</body>
<style>
body{
 background: radial-gradient(circle, #FFDEE9 0%, #B5FFFC 100%);
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
.button-3d {
  display: inline-block;
  padding: 10px 20px;
  background-color: #9c27b0;
  color: white;
  text-align: center;
  text-decoration: none;
  border: none;
  border-radius: 5px;
  transition: transform 0.3s;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.button-3d:hover {
  transform: translateY(2px);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
</html>
