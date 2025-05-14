<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
 public function storeProf(Request $request, $id)
{
    // العثور على المستخدم بواسطة الـ ID
    $user = User::findOrFail($id);

    // التحقق من صحة البيانات
    $request->validate([
        'name'  => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'info'  => 'required|string|max:255', // رقم الهوية
    ]);

    // تحديث أو إنشاء البروفايل
    $user->profile()->updateOrCreate(
        ['user_id' => $user->id], // شرط التحقق (مفتاح العلاقة)
        [
            'name'  => $request->name,
            'phone' => $request->phone,
            'info'  => $request->info,
        ]
    );

    return view('prof.index', compact('user'));
}

public function index($id){
        $user = User::findOrFail($id);
        return view('prof.index', compact('user'));
    }
    public function create($id){
        $user = User::findOrFail($id);
        return view('prof.create', compact('user'));
    }
}
