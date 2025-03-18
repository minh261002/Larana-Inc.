<?php

namespace App\Host\Http\Requests\Property;

use App\Admin\Http\Requests\BaseRequest;

class PropertyRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'name' => 'required',
            'tagline' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
            'area' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'description' => 'nullable',
            'gallery' => 'nullable',
            'image' => 'required',
            'category_id' => 'required',
            'amenities' => 'required',
            'services' => 'required',
            'children' => 'nullable',
            'guests' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'tagline.required' => 'Tagline không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'lat.required' => 'Vĩ độ không được để trống',
            'lng.required' => 'Kinh độ không được để trống',
            'price.required' => 'Giá không được để trống',
            'area.required' => 'Diện tích không được để trống',
            'bedrooms.required' => 'Số phòng ngủ không được để trống',
            'bathrooms.required' => 'Số phòng tắm không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'amenities.required' => 'Tiện ích không được để trống',
            'services.required' => 'Dịch vụ không được để trống',
        ];
    }
}
