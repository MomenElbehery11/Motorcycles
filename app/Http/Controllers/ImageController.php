<?php
// app/Http/Controllers/ImageController.php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('motors.index', compact('images'));
    }

    public function create()
    {
        return view('motors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');
        $imagePrice=$request->price;
        Image::create([
            'path' => $imagePath,
            'price' => $imagePrice,
        ]);

        return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
    }

    public function purchase($id,Request $request){
        $image=Image::findOrfail($id);
        $image->quantity=$request->quantity;
            $image->total =$request->quantity * $image->price;
            $image->reciet=Str::random(10);
            $image->save();
        return view('motors.purchase',compact('image'));
    }

}
