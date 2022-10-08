<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(): \Inertia\Response
    {
        $loans = [
            [
                'id' => 1,
                'status' => 0,
                'demanded_interest_rate' => 23.42,
                'amount' => 500,
                'detail' => [],
                'lender' => null,
                'payment_due_date' => '12/23/2022',
                'offers' => [
                    [
                        'id' => 1,
                        'lender' => [
                            'name' => 'davit',
                            'reputation' => 300,
                        ],
                        'status' => 0,
                        'offered_interest_rate' => 23.42,
                        'offered_amount' => 500,
                        'payment_due_date' => '12/23/2022'
                    ]
                ],
            ],
            [
                'id' => 2,
                'status' => 1,
                'demanded_interest_rate' => 23.42,
                'amount' => 500,
                'lender' => [
                    'name' => 'davit',
                    'reputation' => 1000,
                ],
                'detail' => [
                    'total_amount' => 3000,
                    'interest_rate' => 15,
                    'left_base_amount_to_pay' => 2000,
                    'left_interest_amount_to_pay' => 1000,
                    'payment_due_date' => '12/23/2022',

                ],
                'payment_due_date' => '12/23/2022',
                'offers' => [],
            ]
        ];
        return Inertia::render('Dashboard',['loans' => $loans]);
    }
    //
}
