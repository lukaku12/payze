<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(): \Inertia\Response
    {
        $data = json_decode(file_get_contents('../config/fakeData.php'),TRUE);;
        $loans = $data['loans'];
        $myOffers = $data['myoffers'];
        $max_limit = 400;
        $filtered_arr = [];
        foreach ($data['loans'] as $key => $value) {
            if($value['status'] == 0 && $value['amount'] <= $max_limit) {
                $filtered_arr[] = $value;
            };
        }
        return Inertia::render('Dashboard',[
            'loans' => $loans,
            'myOffers' => $myOffers,
            'pendingLoans' => $filtered_arr
        ]);
    }
    //
}
