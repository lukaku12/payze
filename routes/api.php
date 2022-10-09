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
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;

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
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);
    $name = 'test';
    $reputation = 233;
    $validated = $request->validate([
        'loan_id' => 'required',
        'offered_interest_rate' => 'required',
        'offered_amount' => 'required',
        'currency ' => 'required',
        'payment_due_date' => 'required',
    ]);
    $validated['lender']['name'] = $name;
    $validated['lender']['reputation'] = $reputation;
    $validated['id'] = rand(1231,78733);
    foreach ($ConfigData['loans'] as $key => $value) {
        if($value['id'] == $validated['loan_id']) {
            $ConfigData['loans'][$key]['offers'][] = $validated;
            $ConfigData['myoffers'][] = $validated;
            file_put_contents('../config/fakeData.php', json_encode($ConfigData));
        }
    }
    return ['status' => true, 'data' => $validated];



});
Route::get('/loans/offer/accept/{id}/{offer_id}', function ($id,$offer_id) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;
    foreach ($ConfigData['loans'] as $key => $value) {
        if(!empty($value['offers'])) {
            foreach ($value['offers'] as $key2 => $value2) {
                if($value2['id'] == $offer_id) {
                    $value2['status'] = 1;
                    $ConfigData['loans'][$key]['offers'][$key2]['status'] = 1;
                    $value['status'] = 1;
                    $value['detail'] = [
                        'total_amount' => $value2['offered_amount'] * $value2['offered_interest_rate']/100 + $value2['offered_amount'],
                        'interest_rate' => 15,
                        'left_base_amount_to_pay' => $value2['offered_amount'],
                        'left_interest_amount_to_pay' => $value2['offered_amount'] * $value2['offered_interest_rate']/100,
                        'payment_due_date' => '12/23/2022',
                    ];
                    $ConfigData['loans'][$key]['status'] = 1;
                    file_put_contents('../config/fakeData.php', json_encode($ConfigData));
                    return ['status' => true, 'loan' => $value];
                }
            }
        }
    };
    return ['status' => false];
});
Route::get('/loans/offer/reject/{id}/{offer_id}', function ($id,$offer_id) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);
    foreach ($ConfigData['loans'] as $key => $value) {
        if(!empty($value['offers'])) {
            foreach ($value['offers'] as $key2 => $value2) {
                if($value2['id'] == $offer_id) {
                    $value2['status'] = 2;
                    $ConfigData['loans'][$key]['offers'][$key2]['status'] = 2;
                    file_put_contents('../config/fakeData.php', json_encode($ConfigData));
                    return ['status' => true, 'loan' => $ConfigData['loans'][$key]['offers'][$key2]];
                }
            }
        }
    };
    return ['status' => false];
});
Route::get('/pending/loans', function (Request $request) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);
    $max_limit = 400;
    $filtered_arr = [];
    foreach ($ConfigData['loans'] as $key => $value) {
        if($value['status'] == 0 && $value['amount'] <= $max_limit) {
            $filtered_arr[] = $value;
        };
    }
    return $filtered_arr;
});
Route::middleware('auth:sanctum')->get('/myoffers', function (Request $request) {
    $ConfigData = json_decode(file_get_contents('../config/fakeData.php'),TRUE);
    return $ConfigData['myOffers'];
});
