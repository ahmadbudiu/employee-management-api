<?php

namespace App\Actions\Employee;

use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Exception;

class CreateEmployee
{
    use AsAction;

    public function handle(CreateEmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->validated();
            $newEmployee = Employee::create($params);
            if (isset($params['identity'])) {
                $fileName = now()->toDateTimeString() . '-' . $params['identity']->getClientOriginalName();
                $newEmployee->identity = 'storage/' . $fileName;
                $newEmployee->save();
                $params['identity']->move(public_path('storage'), $fileName);
            }
            DB::commit();
            return $newEmployee;
        } catch (Exception $e) {
            return null;
        }
    }
}
