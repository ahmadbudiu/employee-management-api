<?php

namespace App\Http\Controllers;

use App\Actions\Position\GetPosition;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    public function index(): JsonResponse
    {
        return ResponseHelper::json(GetPosition::run()->pluck('name')->toArray(), 200);
    }
}
