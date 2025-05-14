<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class ImageUploadController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image',
        'price' => 'required|numeric|min:0',
    ]);

    $imagePath = $request->file('image')->store('uploads', 'public');
    $imagePrice = $request->price;

    Image::create([
        'path' => $imagePath,
        'price' => $imagePrice,
        'user_id' => auth()->id(), // ✅ السطر ده ضروري
    ]);

    return back()->with('success', 'Image uploaded successfully');
}


    public function index()
    {
        $images = Image::all();
        return view('motors.upload', compact('images'));
    }
}

