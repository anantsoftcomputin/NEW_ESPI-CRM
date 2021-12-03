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
        'document_list' => [
            '10th' => '10th Result',
            '12th' => '12th Result',
            'diploma' => 'Diploma Result',
            'bachelor_degree' => 'Bachelor Degree',
            'master' => 'Master Degree',
            'transcript' => 'Transcript Documents',
            'work_experience' => 'Work Experience Documents',
            'Resume' => 'Resume Documents',
            'lor' => 'LOR Documents',
            'other' => 'Other Documents',
            ]
    ],
];
