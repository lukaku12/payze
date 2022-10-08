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
        $pendingLoans = $data['pendingLoans'];
        return Inertia::render('Dashboard',[
            'loans' => $loans,
            'myOffers' => $myOffers,
            'pendingLoans' => $pendingLoans
        ]);
    }
    //
}
