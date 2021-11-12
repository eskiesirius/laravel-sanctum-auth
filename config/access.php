<?php

/*
 * All configuration options for Tshirt
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Access
    |--------------------------------------------------------------------------
    |
    | Configurations related to the Tshirt access/authorization options
    */
    'role' => [

        /*
         * The name of the administrator role
         * Should be Administrator by design and unable to change from the backend
         * It is not recommended to change
         */
        'admin' => 'Administrator',

        /*
         * The name of the Customer Service role
         */
        'customer_service' => 'Customer Service',

        /*
         * The name of the Manufacturer role
         */
        'manufacturer' => 'Manufacturer',

        /*
         * The name of the Customer role
         */
        'customer' => 'Customer',
    ],
];
