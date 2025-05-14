<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function page()
    {
        return response()->json(['message' => 'Admin page']);
    }
}
