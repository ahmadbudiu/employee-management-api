<?php

namespace App\Actions\Employee;

use App\Exceptions\DataNotFoundException;
use App\Models\Employee;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowEmployee
{
    use AsAction;

    /**
     * @param $employeeId
     * @return mixed
     * @throws DataNotFoundException
     */
    public function handle($employeeId)
    {
        $employee = Employee::find($employeeId);
        if (empty($employee)) {
            throw new DataNotFoundException();
        }
        return $employee;
    }
}
