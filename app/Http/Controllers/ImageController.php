<?php
// app/Http/Controllers/ImageController.php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        Image::create([
            'path' => $imagePath,
            'price' => $request->input('price'),
        ]);

        return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
    }

    public function purchase($id,Request $request){
        $image=Image::findOrfail($id);
        $image->quantity=$request->quantity;
            $image->total =$request->quantity * 5950;
            $image->save();
        return view('motors.purchase',compact('image'));
    }
}
