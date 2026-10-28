<?php

/*
| Subscription plans shown on the homepage pricing carousel and the sign-up "Choose Package" step.
| Prices are monthly and in ETB (the base currency); other currencies are converted with live rates.
| A null price means "priced on request". Each plan's module list lives in resources/data/packages/{slug}.json.
*/

return [

    'base_currency' => 'ETB',

    // Currencies offered in the selector (code => label).
    'currencies' => [
        'ETB' => 'Ethiopian Birr',
        'USD' => 'US Dollar',
        'EUR' => 'Euro',
        'GBP' => 'British Pound',
        'AED' => 'UAE Dirham',
        'SAR' => 'Saudi Riyal',
        'KES' => 'Kenyan Shilling',
    ],

    'plans' => [
        'shop' => [
            'name' => 'Shop',
            'tagline' => 'Affordable solutions designed just for small shops',
            'price' => 499,
            'image' => 'images/icon/Shop.png',
        ],
        'startup' => [
            'name' => 'Startup',
            'tagline' => 'A simple and affordable plan only for small businesses',
            'price' => 4166,
            'image' => 'images/icon/Startup.png',
        ],
        'factory' => [
            'name' => 'Factory',
            'tagline' => 'Specifically geared toward growing businesses',
            'price' => 16666,
            'image' => 'images/icon/Factory.png',
            'badge' => 'Bestseller',
        ],
        'enterprise' => [
            'name' => 'Enterprise',
            'tagline' => 'Tailored to the unique needs of large enterprises',
            'price' => null,
            'image' => 'images/icon/Enterprise.png',
            'badge' => 'Exclusive',
            'dark' => true,
        ],
        'special' => [
            'name' => 'Special',
            'tagline' => 'Ignite your creativity to design your own unique module set',
            'price' => null,
            'image' => 'images/icon/Special.png',
        ],
    ],

];
