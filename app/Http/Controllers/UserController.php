<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $users = User::paginate(2);
        return view('admin.layouts.users', compact('users'));
    }

    function edit()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('users.crud.edit', compact('user'));
    }

    function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->save();
        $products = Product::all();
        return view('users.layouts.index', compact('products'));
    }

    function formChangePassword()
    {
        return view('users.crud.changePW');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password successfully changed!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
