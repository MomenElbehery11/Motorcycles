<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function store($id, Request $request)
    {
        // Validate quantity
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $image = Image::findOrFail($id);
        $quantity = $request->quantity;
        $price = $image->price;
        $total = $quantity * $price;

        // تحقق من الحد الأقصى للـ total (مناسب مع نوع الحقل في قاعدة البيانات)
        if ($total > 99999999.99) {
            return redirect()->back()->withErrors([
                'quantity' => 'القيمة الإجمالية كبيرة جدًا. قلل الكمية أو السعر.',
            ])->withInput();
        }

        // توليد reciet فريد
        do {
            $reciet = Str::upper(Str::random(10));
        } while (Purchase::where('reciet', $reciet)->exists());

        // إنشاء الشراء
        $purchase = Purchase::create([
            'user_id'   => Auth::id(),
            'image_id'  => $image->id,
            'quantity'  => $quantity,
            'total'     => $total,
            'reciet'    => $reciet,
        ]);

        return view('motors.purchase', ['purchase' => $purchase]);
    }
}
