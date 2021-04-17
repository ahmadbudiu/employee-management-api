<?php

namespace App\Actions\Employee;

use App\Http\Requests\Employee\EmployeeFilterRequest;
use App\Models\Employee;
use EloquentBuilder;
use Lorisleiva\Actions\Concerns\AsAction;

class GetEmployee
{
    use AsAction;

    public function handle(EmployeeFilterRequest $request = null)
    {
        if ($request == null) {
            return Employee::all();
        }
        return EloquentBuilder::to(Employee::class, $request->validated())->get();
    }
}
