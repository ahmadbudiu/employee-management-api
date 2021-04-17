<?php

namespace App\Actions\Position;

use App\Models\Position;
use Lorisleiva\Actions\Concerns\AsAction;

class GetPosition
{
    use AsAction;

    public function handle()
    {
        return Position::all();
    }
}
