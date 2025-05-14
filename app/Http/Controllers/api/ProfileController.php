<?php

namespace App\Http\Controllers\Api;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->get();

        return response()->json([
            'status' => true,
            'message' => 'profiles retrieved successfully',
            'data' => $profile
        ]);
    }
    public function show($id)
    {
        $profile = Profile::with('user')->find($id);

        return response()->json([
            'status' => true,
            'message' => 'profile retrieved successfully',
            'data' => $profile
        ]);
    }
public function create(Request $request, $id)
{
    $user = User::findOrFail($id); // لو مش موجود هيرجع 404 تلقائيًا

    // Validate the request data
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'info'  => 'required|string|max:255',
    ]);

    // Create or update the profile for the user
    $profile = Profile::updateOrCreate(
        ['user_id' => $id], // شرط التحديث لو البروفايل موجود
        [
            'name'  => $validated['name'],
            'phone' => $validated['phone'],
            'info'  => $validated['info'],
        ]
    );

    return response()->json([
        'status' => true,
        'message' => 'Profile created or updated successfully',
        'data' => $profile
    ]);
}

}
