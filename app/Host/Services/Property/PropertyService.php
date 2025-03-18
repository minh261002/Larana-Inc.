<?php

namespace App\Host\Services\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyService implements PropertyServiceInterface
{
    protected $repository;

    public function __construct(
        PropertyRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        // dd($request->validated());
        $data = $request->validated();

        //         array:18 [▼ // app/Host/Services/Property/PropertyService.php:20
//   "name" => "Toàn bộ căn hộ cho thuê tại Bình Thạnh, Việt Nam"
//   "tagline" => "502_Studio xinh xắn/phố ẩm thực Bình Thạnh"
//   "address" => "229 Phố Tây Sơn, Ngã Tư Sở, Đống Đa, Hà Nội, Việt Nam"
//   "lat" => "21.0057396"
//   "lng" => "105.8234349"
//   "price" => "100000"
//   "sale_price" => "10000"
//   "area" => "1"
//   "bedrooms" => "1"
//   "bathrooms" => "1"
//   "description" => """
//     <p>Từ căn hộ bạn sẽ kết nối đến c&aacute;c địa điểm ăn uống, giải tr&iacute; địa phương rất dễ d&agrave;ng, c&oacute; thể đi bộ, bao quanh l&agrave; những con p ▶
//     &nbsp;</p>
//     """
//   "gallery" => array:2 [▶]
//   "image" => "/uploads/images/icons/cityview.svg"
//   "category_id" => "3"
//   "amenities" => array:2 [▶]
//   "services" => array:1 [▶]
//   "children" => "0"
//   "guests" => "1"
// ]

        $amenities = $data['amenities'];
        unset($data['amenities']);
        $services = $data['services'];
        unset($data['services']);

        if (empty($data['image'])) {
            $data['image'] = 'admin/images/not-found.jpg';
        }

        if (empty($data['gallery'])) {
            $data['gallery'] = [];
        }

        $data['gallery'] = json_encode($data['gallery']);
        $data['user_id'] = Auth::guard('web')->id();

        $property = $this->repository->create($data);

        $property->amenities()->sync($amenities);
        $property->services()->sync($services);

        return $property;
    }
}
