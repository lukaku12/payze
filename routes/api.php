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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/loans/create', function (Request $request) {
    $validated = $request->validate([
        'amount' => 'required',
        'currency ' => 'required',
        'payment_due_date' => 'required',
        'demanded_interest_rate' => 'required',
    ]);
    $validated['id'] = 2;
    return $validated;
});
Route::post('/loans/offer/create', function (Request $request) {
    return $validated = $request->validate([
        'loan_id' => 'required',
        'offered_amount' => 'required',
        'currency ' => 'required',
        'payment_due_date' => 'required',
        'demanded_interest_rate' => 'required',
    ]);
});
Route::middleware('auth:sanctum')->get('/loans/offer/accept/:id', function (Request $request) {
    return ;
});
Route::middleware('auth:sanctum')->get('/loans/offer/reject/:id', function (Request $request) {
    return $request->all();
});
Route::middleware('auth:sanctum')->get('/pending/loans', function (Request $request) {
    return [
        [
        'id' => 1,
        'status' => 0,
        'demanded_interest_rate' => 23.42,
        'amount' => 500,
        'lender' => null,
        'payment_due_date' => '12/23/2022',]
    ];
});
Route::middleware('auth:sanctum')->get('/myoffers', function (Request $request) {
    return [
        'id' => 1,
        'status' => 0,
        'demanded_interest_rate' => 23.42,
        'amount' => 500,
        'demand_loan' => [
            'demanded_interest_rate' => 23.42,
            'amount' => 500,
            'payment_due_date' => '12/23/2022',
            'user' => 'davit'
        ],
        'lender' => null,
        'payment_due_date' => '12/23/2022',
    ];
});
