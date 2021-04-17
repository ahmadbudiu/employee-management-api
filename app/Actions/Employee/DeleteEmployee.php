<?php

namespace App\Actions\Employee;

use Lorisleiva\Actions\Concerns\AsAction;

class DeleteEmployee
{
    use AsAction;

    public function handle($employeeId)
    {
        $employee = ShowEmployee::run($employeeId);
        return $employee->delete();
    }
}
