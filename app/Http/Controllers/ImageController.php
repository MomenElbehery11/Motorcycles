<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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
    $imagePrice = $request->price;

    Image::create([
        'path' => $imagePath,
        'price' => $imagePrice,
        'user_id' => auth()->id(), // ✅ أضف السطر ده
    ]);

    return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
}


public function purchase($id, Request $request)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $originalImage = Image::findOrFail($id); // الصورة الأصلية

    // عمل نسخة جديدة منها
    $purchasedImage = $originalImage->replicate();
    $purchasedImage->quantity = $request->quantity;
    $purchasedImage->total = $request->quantity * $originalImage->price;
    $purchasedImage->reciet = Str::random(10);
    $purchasedImage->user_id = Auth::id(); // المستخدم اللي اشترى
    $purchasedImage->save(); // حفظ النسخة كصف جديد

    return view('motors.purchase', ['image' => $purchasedImage]);
}
}
