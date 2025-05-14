<!-- resources/views/images/create.blade.php -->
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <label for="image">Image:</label><br>
    <input type="file" name="image" required><br><br>

    
    <label for="price">price:</label><br>
    <input type="number" name="price" required><br><br>

    <button type="submit">Upload</button>
</form>
<h1 class="d2"><a href="{{route('prof.index',auth()->user()->id)}}" role="button"class="button-red-outline ">الصفحة الشخصية</a></h1>
<style>
  @keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

body {
    background: linear-gradient(270deg, #ff7e5f, #feb47b, #86a8e7, #91eae4);
    background-size: 800% 800%;
    animation: gradient 15s ease infinite;
}
</style>
