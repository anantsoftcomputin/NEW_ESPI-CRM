<?php

return [
    'enquires'         => [
        'smart'            => true,
        'multi_term'       => true,
        'case_insensitive' => true,
        'use_wildcards'    => false,
        'starts_with'      => false,
    ],
    'enquires_detail'         => [
        'marital_status' =>  ['Single','Married','Divorced','Separated','Widowed','Unknown'],
        'multi_term'       => true,
        'case_insensitive' => true,
        'use_wildcards'    => false,
        'starts_with'      => false,
        'country_interested' => ['Canada','USA','UK','Australia','New Zealand','Europe','Finland','Netherland','Poland','Germany','France','Switzerland'],
    ],
];
