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
        return response()->json(Image::all());
    }
}
