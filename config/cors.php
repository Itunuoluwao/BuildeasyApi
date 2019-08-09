<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['http://buildeasy-supplier.herokuapp.com'],
    'allowedHeaders' => ['*'],
    'allowedMethods' =>  ['GET', 'POST', 'PUT',  'DELETE','INCLUDE'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
