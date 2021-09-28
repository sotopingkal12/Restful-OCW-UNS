<?php

use App\Http\Controllers\API\CronJobController;
use App\Http\Controllers\API\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('PresensiBerlangsung', [PresensiController::class, 'getPresensiBerlangsung']);
Route::get('presensi/{codename}', [PresensiController::class, 'getPresensiMatkul']);

Route::get('cronJob', [CronJobController::class, 'runCron']);