<?php
return [
    'loans' => [
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
                    'offered_interest_rate' => 24.42,
                    'offered_amount' => 500,
                    'payment_due_date' => '12/21/2022'
                ],

                [
                'id' => 2,
                'lender' => [
                    'name' => 'nika',
                    'reputation' => 600,
                ],
                'status' => 0,
                'offered_interest_rate' => 23.42,
                'offered_amount' => 500,
                'payment_due_date' => '12/23/2022'
                ],
                [
                    'id' => 3,
                    'lender' => [
                        'name' => 'ramazi',
                        'reputation' => 700,
                    ],
                    'status' => 3,
                    'offered_interest_rate' => 73.42,
                    'offered_amount' => 500,
                    'payment_due_date' => '12/25/2022'
                ],
            ],
        ],
        [
            'id' => 3,
            'status' => 0,
            'demanded_interest_rate' => 21.42,
            'amount' => 300,
            'detail' => [],
            'lender' => null,
            'payment_due_date' => '12/23/2022',
            'offers' => [
                [
                    'id' => 4,
                    'lender' => [
                        'name' => 'davit',
                        'reputation' => 300,
                    ],
                    'status' => 0,
                    'offered_interest_rate' => 24.42,
                    'offered_amount' => 300,
                    'payment_due_date' => '12/21/2022'
                ],

                [
                    'id' => 5,
                    'lender' => [
                        'name' => 'nika',
                        'reputation' => 600,
                    ],
                    'status' => 0,
                    'offered_interest_rate' => 23.42,
                    'offered_amount' => 300,
                    'payment_due_date' => '12/23/2022'
                ],
                [
                    'id' => 6,
                    'lender' => [
                        'name' => 'ramazi',
                        'reputation' => 700,
                    ],
                    'status' => 3,
                    'offered_interest_rate' => 73.42,
                    'offered_amount' => 300,
                    'payment_due_date' => '12/25/2022'
                ],
            ],
        ],
        [
            'id' => 3,
            'status' => 0,
            'demanded_interest_rate' => 11.42,
            'amount' => 300,
            'detail' => [],
            'lender' => null,
            'payment_due_date' => '12/23/2022',
            'offers' => [],
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
    ],
    'myoffers' => [
        [
            'id' => 1,
            'status' => 0,
            'offered_interest_rate' => 23.42,
            'amount' => 500,
            'demand_loan' => [
                'demanded_interest_rate' => 23.42,
                'amount' => 500,
                'payment_due_date' => '12/23/2022',
                'user' => 'davit'
            ],
            'payment_due_date' => '12/23/2022',
        ],
        [
            'id' => 2,
            'status' => 1,
            'offered_interest_rate' => 21.42,
            'amount' => 500,
            'demand_loan' => [
                'demanded_interest_rate' => 23.42,
                'amount' => 500,
                'payment_due_date' => '12/23/2022',
                'user' => 'davit'
            ],
            'payment_due_date' => '11/23/2022',
        ],
        [
            'id' => 3,
            'status' => 2,
            'offered_interest_rate' => 21.42,
            'amount' => 200,
            'demand_loan' => [
                'demanded_interest_rate' => 21,
                'amount' => 500,
                'payment_due_date' => '12/23/2022',
                'user' => 'davit'
            ],
            'payment_due_date' => '11/23/2022',
        ],
        [
            'id' => 4,
            'status' => 3,
            'offered_interest_rate' => 11.42,
            'amount' => 500,
            'demand_loan' => [
                'demanded_interest_rate' => 21,
                'amount' => 200,
                'payment_due_date' => '12/23/2022',
                'user' => 'davit2'
            ],
            'payment_due_date' => '11/23/2022',
        ]
    ],
    'pendingLoans' => [
        [
            'id' => 23,
            'status' => 0,
            'demanded_interest_rate' => 13.42,
            'amount' => 400,
            'loaner' => 'gio',
            'reputation' => 322,
            'payment_due_date' => '2/23/2024',
        ],
        [
            'id' => 25,
            'status' => 0,
            'demanded_interest_rate' => 3.42,
            'amount' => 200,
            'loaner' => 'nodo',
            'reputation' => 1000,
            'payment_due_date' => '12/23/2023',
        ],
        [
            'id' => 26,
            'status' => 0,
            'demanded_interest_rate' => 23.42,
            'amount' => 500,
            'loaner' => 'toko',
            'reputation' => 122,
            'payment_due_date' => '1/23/2023',
        ],
        [
            'id' => 27,
            'status' => 0,
            'demanded_interest_rate' => 23.42,
            'amount' => 500,
            'loaner' => 'gio',
            'reputation' => 322,
            'payment_due_date' => '12/23/2026',
        ],
    ]
];
