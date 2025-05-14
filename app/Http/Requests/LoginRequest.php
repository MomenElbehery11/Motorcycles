<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // هنا لو عايز تحدد صلاحيات معينة تقدر تضيف شرط هنا
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|email',    // التحقق من الإيميل
            'password' => 'required|string',   // التحقق من كلمة السر
        ];
    }
}
