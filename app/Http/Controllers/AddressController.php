<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\AddressResource;
use Illuminate\Http\JsonResponse;
use Indonesia;

class AddressController extends Controller
{
    public function getAllProvinces(): JsonResponse
    {
        $provinces = AddressResource::collection(Indonesia::allProvinces());
        return ResponseHelper::json($provinces, 200);
    }

    public function getCitiesByProvince($provinceId): JsonResponse
    {
        $cities = AddressResource::collection(Indonesia::findProvince($provinceId, ['cities'])->cities);
        return ResponseHelper::json($cities, 200);
    }

    public function getDistrictsByCity($cityId): JsonResponse
    {
        $districts = AddressResource::collection(Indonesia::findCity($cityId, ['districts'])->districts);
        return ResponseHelper::json($districts, 200);
    }

    public function getVillagesByDistrict($districtId): JsonResponse
    {
        $villages = AddressResource::collection(Indonesia::findDistrict($districtId, ['villages'])->villages);
        return ResponseHelper::json($villages, 200);
    }
}
