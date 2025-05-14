<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
class PurchaseController extends Controller
{
    public function store($id, Request $request)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $image = Image::findOrFail($id);

    $quantity = $request->quantity;
    $price = $image->price;

    // تأكيد السعر موجود وصحيح
    if (!is_numeric($price)) {
        return response()->json([
            'message' => 'sorry, the price is not valid'
        ], 422);
    }

    $total = round($quantity * $price, 2);

    // الحد الأقصى للقيمة الإجمالية
    if ($total > 99999999.99) {
        return response()->json([
            'message' => 'the total value is too large. Please reduce the quantity or price.',
        ], 422);
    }

    // توليد reciet فريد
    do {
        $reciet = Str::upper(Str::random(10));
    } while (Purchase::where('reciet', $reciet)->exists());

    $purchase = Purchase::create([
        'user_id'   => Auth::id(),
        'image_id'  => $image->id,
        'quantity'  => $quantity,
        'total'     => $total,
        'reciet'    => $reciet,
    ]);

    return response()->json([
        'message' => 'Purchase created successfully',
        'purchase' => $purchase,
    ]);
}

}
