<?php

namespace App\Actions\Employee;

use App\Http\Requests\Employee\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Exception;

class UpdateEmployee
{
    use AsAction;

    public function handle(UpdateEmployeeRequest $request, $employeeId)
    {
        DB::beginTransaction();
        try {
            $params = $request->validated();
            $employee = ShowEmployee::run($employeeId);
            $employee->update($params);
            if (isset($params['identity'])) {
                $fileName = now()->toDateTimeString() . '-' . $params['identity']->getClientOriginalName();
                $employee->identity = 'storage/' . $fileName;
                $employee->save();
                $params['identity']->move(public_path('storage'), $fileName);
            }
            DB::commit();
            return $employee;
        } catch (Exception $e) {
            return null;
        }
    }
}
