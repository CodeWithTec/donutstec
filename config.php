<?php 


return [
    'database' => [
        'host' => 'localhost',
        'dbname' => 'db_donutstec_inc',
        'port' => 3306,
        'charset' => 'utf8mb4',
    ],

    'services' =>[
        'MTN' => [
            'name' => 'MTN',
            'api_key' => 'your_mtn_api_key',
            'api_secret' => 'your_mtn_api_secret',
        ],
        'Airtel' => [
            'name' => 'Airtel',
            'api_key' => 'your_airtel_api_key',
    ]
]

];