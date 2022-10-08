<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use    \Illuminate\Support\Facades\Auth;
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
Route::get('/loans/offer/create', function (Request $request) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);
    $name = 'test';
    return $ConfigData['loans'];
    return $validated = $request->validate([
        'loan_id' => 'required',
        'offered_amount' => 'required',
        'currency ' => 'required',
        'payment_due_date' => 'required',
        'demanded_interest_rate' => 'required',
    ]);

});
Route::get('/loans/offer/accept/{id}', function ($id) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;
    foreach ($ConfigData['loans'] as $key => $value) {
        if($value['id']== $id) {
            $value['status'] = 1;
            $ConfigData['loans'][$key]['status'] = 1;
            file_put_contents('../config/fakeData.php', json_encode($ConfigData));
            return ['status' => true, 'loan' => $value];
        }
    };
    return ['status' => false];
});
Route::get('/loans/offer/reject/{id}', function ($id) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;

    foreach ($ConfigData['loans'] as $key => $value) {
        if($value['id']== $id) {
            $value['status'] = 2;
            $ConfigData['loans'][$key]['status'] = 2;
            file_put_contents('../config/fakeData.php', json_encode($ConfigData));
            return ['status' => true, 'loan' => $value];
        }
    }
    return ['status' => false];
});
Route::middleware('auth:sanctum')->get('/pending/loans', function (Request $request) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;
    return $ConfigData['pendingLoans'];
});
Route::middleware('auth:sanctum')->get('/myoffers', function (Request $request) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;
    return $ConfigData['myOffers'];
});
