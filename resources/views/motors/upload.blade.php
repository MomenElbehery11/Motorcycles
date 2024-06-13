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
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Images</h2>
    @foreach ($images as $image)
        <div>
            <img src="{{ asset('storage/' . $image->path) }}"  width="200" height="200" alt="Uploaded Image">
        </div>
    @endforeach
    <a href="{{route('images.index')}}">جميع الدراجات النارية</a>
</body>
</html>
