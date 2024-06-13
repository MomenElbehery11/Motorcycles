<?php

// app/Http/Controllers/ImageUploadController.php
namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded image
        $path = $request->file('image')->store('images', 'public');

        // Save the image path to the database
        $image = new Image();
        $image->path = $path;
        $image->save();

        // Return a response or view
        return back()->with('success', 'Image uploaded successfully');
    }

    public function index()
    {
        $images = Image::all();
        return view('motors.upload', compact('images'));
    }
}

