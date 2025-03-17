<?php

namespace App\Admin\Http\Requests\Category;

use App\Admin\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable'
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => 'required|exists:categories,id',
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID không được để trống',
            'id.exists' => 'ID không tồn tại',
            'name.required' => 'Tên danh mục không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];
    }
}
