<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Upload your image']);
    }

    public function upload(Request $request)
    {
        // Handle image upload logic here
        return response()->json(['message' => 'Image uploaded successfully']);
    }
}
