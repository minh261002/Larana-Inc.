<?php

namespace App\Admin\Http\Requests\Notification;

use App\Admin\Http\Requests\BaseRequest;

class NotificationRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'objects' => 'required',
            'user_types' => 'nullable',
            'user_id' => 'nullable',
            'admin_types' => 'nullable',
            'admin_id' => 'nullable',
            'title' => 'required',
            'content' => 'required',
        ];
    }
}