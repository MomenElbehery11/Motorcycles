<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function create()
    {
        // You might want to return a JSON response or some data
        return response()->json(['message' => 'Create image']);
    }

    public function store(Request $request)
    {
        // Handle image store
        $image = new Image();
        $image->path = $request->input('path');
        // other attributes...

        $image->save();

        return response()->json(['message' => 'Image uploaded successfully', 'image' => $image], 201);
    }
}
