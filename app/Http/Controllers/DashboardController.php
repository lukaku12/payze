<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(): \Inertia\Response
    {
        $data = require '../../../config/fakeData.php';
        $loans = $data['loans'];
        $myOffers = $data['myoffers'];
        return Inertia::render('Dashboard',['loans' => $loans,'myOffers' => $myOffers]);
    }
    //
}
