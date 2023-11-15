<?php

use Illuminate\Support\Facades\Facade;

return [
    'user' => [
        'user_type' => [
            'teacher' => 'teacher',
            'student' => 'student',
            'family' => 'family',
            'admin' => 'admin',
            'super_admin' => 'super-admin',
        ],
    ],
    'student' => [
        'status' => [
            'pending' => 'pending',
            'enrolled' => 'enrolled',
            'approved' => 'approved',
            'under_review' => 'under review',
            'for_resolution' => 'for resolution',
            'for_reenrollment' => 'for reenrollment',
            'for_fees_assessment' => 'for fees assessment',
            'for_payment' => 'for payment',
            'for_admission' => 'for admission',
            'graduted' => 'graduted',
            'denied' => 'denied',
            'transfer_out' => 'transfer out',
            'withdrawn' => 'withdrawn',
            'cancelled' => 'cancelled',
        ],
        'payment_options' => [
            'full_payment' => 'full payment',
            'semi_annual' => 'semi annual',
            'quarterly' => 'quarterly',
            'monthly' => 'monthly'
        ],
        'gender' => [
            'male' => 'male',
            'female' => 'female',
        ],
        'type' => [
            'new' => 'new',
            'old' => 'old',
            'continuing' => 'continuing',
        ]
    ],
    'family' => [
        'education_attaiment' => [
            'high_school_graduate' => 'high school graduate',
            'bachelors_degree' => "bachelor's degree",
            'masters_degree' => "master's degree",
            'vocational_technical' => 'vocational / technical',
            'others' => "others",
        ],
    ],
    'teacher' => [
        'education_attaiment' => [
            'high_school_graduate' => 'high school graduate',
            'bachelors_degree' => "bachelor's degree",
            'masters_degree' => "master's degree",
            'vocational_technical' => 'vocational / technical',
            'others' => "others",
        ],
        'gender' => [
            'male' => 'male',
            'female' => 'female',
        ]
    ],
    'score' => [
        'task_type' => [
            'written_work' => 'written work',
            'quarterly_task' => 'quarterly work',
            'performance_task' => 'performance work'
        ]
    ],
    'subject' => [
        'type' => [
            'major' => 'major',
            'minor' => 'minor'
        ]
    ],
    'school' => [
        'status' => [
            'pending' => 'pending',
            'process' => 'process',
            'approved' => 'approved',
        ],
        'classification' => [
            'public' => 'public',
            'private' => 'private',
        ],
        'curricular_offering' => [
            'elementary' => [
                'name' => 'Elementary (Kindergarten - Grade 6)',
                'value' => 'elementary'
            ],
            'lower_secondary' => [
                'name' => 'Lower Secondary (Grade 7 - Grade 10)',
                'value' => 'lower-secondary'
            ],
            'upper_secondary' => [
                'name' => 'Upper Secondary (Grade 11 - Grade 12)',
                'value' => 'upper-secondary'
            ],
            'elementary_lower' => [
                'name' => 'Elementary And Lower Secondary (Kindergarten - Grade 10)',
                'value' => 'elementary-lower-secondary'
            ],
            'lower_upper' => [
                'name' => 'Lower Secondary And Upper Secondary (Grade 7 - Grade 12)',
                'value' => 'lower-secondary-upper-secondary'
            ],
            'elementary_lower_upper' => [
                'name' => 'Elementary, Lower Secondary And Upper Secondary (Kindergarten - Grade 12)',
                'value' => 'elementary-lower-secondary-upper-secondary'
            ],

        ],
    ]



];

