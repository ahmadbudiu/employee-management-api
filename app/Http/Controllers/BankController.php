<?php

namespace App\Http\Controllers;

use App\Actions\Bank\GetBank;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;

class BankController extends Controller
{
    public function index(): JsonResponse
    {
        return ResponseHelper::json(GetBank::run()->pluck('name')->toArray(), 200);
    }
}
