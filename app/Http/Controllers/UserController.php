<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index($id){
        $user=User::findOrfail($id);
        return view('prof.index',compact('user'));
    }
    public function create($id){
        $user=User::findOrfail($id);
        return view('prof.create',compact('user'));
    }
    public function store($id,Request $request){
        $user=User::findOrfail($id);
        $user->info=$request->info;
        $user->phone=$request->phone;
        $user->name=$request->name;
        $randomCode = Str::random(10);
        $user->reciet=$randomCode;
        $user->save();
        return view('prof.index',compact('user'));
    }
}
