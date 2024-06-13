<!-- resources/views/images/create.blade.php -->
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="price">Price:</label><br>
    <input type="text" name="price" required><br><br>

    <label for="image">Image:</label><br>
    <input type="file" name="image" required><br><br>

    <button type="submit">Upload</button>
</form>
