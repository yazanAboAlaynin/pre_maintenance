<?php

namespace App\Http\Controllers\Admin\auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index($message=""){

        return view('admin.auth.register',compact('message'));
    }

    public function register(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'unique:admins|required|email',
            'password' => 'required|min:8',
        ]);

        $data = $request->all();

        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        auth()->guard('admin')->login($admin);

        return redirect('admin/login');
    }


}
