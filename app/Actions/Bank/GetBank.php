<?php

namespace App\Actions\Bank;

use App\Models\Bank;
use Lorisleiva\Actions\Concerns\AsAction;

class GetBank
{
    use AsAction;

    public function handle()
    {
        return Bank::all();
    }
}
