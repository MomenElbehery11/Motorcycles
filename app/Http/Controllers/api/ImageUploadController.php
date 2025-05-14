<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
class ImageUploadController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Upload your image']);
    }

  public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image',
        'price' => 'required|numeric|min:0|max:9999999999',
    ]);

    $imagePath = $request->file('image')->store('uploads', 'public');

    $image = Image::create([
        'path' => $imagePath,
        'price' => $request->price,
        'user_id' => auth()->id(),
    ]);

    return response()->json([
        'message' => 'Image uploaded successfully',
        'image' => $image,
    ], 201); // 201 Created
}

}
