<?php

namespace App\Admin\Http\Requests\Amenity;

use App\Admin\Http\Requests\BaseRequest;

class AmenityRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'name' => 'required',
            'icon' => 'required',
            'description' => 'nullable',
            'group' => 'required',
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => 'required|exists:amenities,id',
            'name' => 'required',
            'icon' => 'required',
            'description' => 'nullable',
            'group' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tiện ích',
            'icon.required' => 'Vui lòng chọn icon',
            'id.required' => 'ID không được để trống',
            'id.exists' => 'ID không tồn tại',
        ];
    }
}