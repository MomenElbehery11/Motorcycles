<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class CustomRegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        return redirect()->route('dashboard', auth()->id()); // بيوجه المستخدم بعد التسجيل
    }
}
