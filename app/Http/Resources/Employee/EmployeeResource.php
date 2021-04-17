<?php

namespace App\Http\Resources\Employee;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
            'bank' => $this->bank,
            'bank_no' => $this->bank_no,
            'zip_code' => $this->zip_code,
            'identity' => (isset($this->identity)) ? url($this->identity) : url(Employee::DEFAULT_IDENTITY),
            'identity_number' => $this->identity_number,
            'dob' => $this->dob->toDateString(),
            'province_id' => $this->village->district->city->province->id,
            'city_id' => $this->village->district->city->id,
            'district_id' => $this->village->district->id,
            'village_id' => $this->village_id,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
