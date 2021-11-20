<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function formRegister()
    {
        return view('users.crud.register');
    }

    public function register(AuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.formSingIn');

    }

    public function formSingIn()
    {
        return view('users.crud.sign_in');
    }

    public function singIn(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            Session::flash('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('user.formSingIn');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
