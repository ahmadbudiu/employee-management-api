<?php

namespace App\Http\Controllers;

use App\Actions\Employee\CreateEmployee;
use App\Actions\Employee\DeleteEmployee;
use App\Actions\Employee\GetEmployee;
use App\Actions\Employee\UpdateEmployee;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\EmployeeFilterRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function index(EmployeeFilterRequest $request): JsonResponse
    {
        $employees = EmployeeResource::collection(GetEmployee::run($request));
        return ResponseHelper::json($employees, 200);
    }

    /**
     * @param CreateEmployeeRequest $request
     * @return JsonResponse
     */
    public function store(CreateEmployeeRequest $request): JsonResponse
    {
        if (isset($request->errors)) {
            return ResponseHelper::json(false, 422, 'Unprocessable entities', $request->errors);
        }
        $newEmployee = CreateEmployee::run($request);
        return ResponseHelper::json($newEmployee, 200);
    }

    /**
     * @param UpdateEmployeeRequest $request
     * @param $employeeId
     * @return JsonResponse
     */
    public function update(UpdateEmployeeRequest $request, $employeeId): JsonResponse
    {
        if (isset($request->errors)) {
            return ResponseHelper::json(false, 422, 'Unprocessable entities', $request->errors);
        }
        $employee = UpdateEmployee::run($request, $employeeId);
        return ResponseHelper::json($employee, 200);
    }

    public function destroy($employeeId): JsonResponse
    {
        return ResponseHelper::json(DeleteEmployee::run($employeeId), 200);
    }
}
