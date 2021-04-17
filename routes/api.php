<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'employee'], function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::post('/{employeeId}', [EmployeeController::class, 'update']);
    Route::delete('/{employeeId}', [EmployeeController::class, 'destroy']);
});

Route::group(['prefix' => 'bank'], function () {
    Route::get('/', [BankController::class, 'index']);
});

Route::group(['prefix' => 'position'], function () {
    Route::get('/', [PositionController::class, 'index']);
});

Route::group(['prefix' => 'indonesia'], function () {
    Route::get('provinces', [AddressController::class, 'getAllProvinces']);
    Route::get('provinces/{provinceId}/cities', [AddressController::class, 'getCitiesByProvince']);
    Route::get('cities/{cityId}/districts', [AddressController::class, 'getDistrictsByCity']);
    Route::get('districts/{districtId}/villages', [AddressController::class, 'getVillagesByDistrict']);
});
