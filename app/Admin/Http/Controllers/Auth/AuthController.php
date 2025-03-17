<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $data = $request->validated();
        $remember = $data['remember'] ?? false;
        unset($data['remember']);

        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
        }
        return back()->with('error', 'Thông tin đăng nhập không chính xác')->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');
    }
}