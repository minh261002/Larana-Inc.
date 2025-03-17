<?php

namespace App\Admin\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ];
    }
}