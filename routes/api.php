<?php

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

Route::post('login',[\App\Http\Controllers\AuthentificationController::class, 'login']);

Route::post('/users',[\App\Http\Controllers\UserController::class, 'store']);


Route::group(
    ['middleware' => 'auth:api'],
    function () {
        //Appointments
Route::get('/appointments', [\App\Http\Controllers\AppointmentController::class, 'index']);
Route::delete('/appointments/{id}',[\App\Http\Controllers\AppointmentController::class, 'destroy']);
Route::post('/appointments',[\App\Http\Controllers\AppointmentController::class, 'store']);
Route::get('/appointments/{id}',[\App\Http\Controllers\AppointmentController::class, 'find']);
Route::put('/appointments/{id}',[\App\Http\Controllers\AppointmentController::class, 'update']);
//Categories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::delete('/categories/{id}',[\App\Http\Controllers\CategoryController::class, 'destroy']);
Route::post('/categories',[\App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/categories/{id}',[\App\Http\Controllers\CategoryController::class, 'find']);
Route::put('/categories/{id}',[\App\Http\Controllers\CategoryController::class, 'update']);
//Pharmaceuticals
Route::get('/pharmaceuticals', [\App\Http\Controllers\PharmaceuticalController::class, 'index']);
Route::delete('/pharmaceuticals/{id}',[\App\Http\Controllers\PharmaceuticalController::class, 'destroy']);
Route::post('/pharmaceuticals',[\App\Http\Controllers\PharmaceuticalController::class, 'store']);
Route::get('/pharmaceuticals/{id}',[\App\Http\Controllers\PharmaceuticalController::class, 'find']);
Route::put('/pharmaceuticals/{id}',[\App\Http\Controllers\PharmaceuticalController::class, 'update']);
//Prescription
Route::get('/prescriptions', [\App\Http\Controllers\PrescriptionController::class, 'index']);
Route::delete('/prescriptions/{id}',[\App\Http\Controllers\PrescriptionController::class, 'destroy']);
Route::post('/prescriptions',[\App\Http\Controllers\PrescriptionController::class, 'store']);
Route::get('/prescriptions/{id}',[\App\Http\Controllers\PrescriptionController::class, 'find']);
Route::put('/prescriptions/{id}',[\App\Http\Controllers\PrescriptionController::class, 'update']);
//User
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::delete('/users/{id}',[\App\Http\Controllers\UserController::class, 'destroy']);
Route::get('/users/{id}',[\App\Http\Controllers\UserController::class, 'find']);
Route::put('/users/{id}',[\App\Http\Controllers\UserController::class, 'update']);

        
        
}
);
