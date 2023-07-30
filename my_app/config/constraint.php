<?php

return [
    'brand' => 'SuperMarket',
    'type' => [
        'text', 'password', 'email', 'number'
    ],
    'path' => [
        'image' => [
            'products' => [
                'avatar' => [
                    'width' => '90',
                    'height' => '60',
                    'path' => 'public/image/products/90x60/'
                ],
                'thumbnail' => [
                    'width' => '150',
                    'height' => '150',
                    'path' => 'public/image/products/150x150/'
                ],
                'detail' => [
                    'width' => '300',
                    'height' => '300',
                    'path' => 'public/image/products/300x300/'
                ]
            ],
        ]
    ],
    'link' => [
        'image' => [
            'products' => [
                'avatar' => 'storage/image/products/90x60/',
                'thumbnail' => 'storage/image/products/150x150/',
                'detail' => 'storage/image/products/300x300/'
            ],
        ]
    ],
    'pattern' => [
        'money' => [
            'EU' => '^([0-9]{1,3}.([0-9]{3}.)*[0-9]{3}|[0-9]+)$',
            'US' => '^([0-9]{1,3},([0-9]{3},)*[0-9]{3}|[0-9]+)(.[0-9][0-9])?$'
        ]
    ],
    'display' => [
        'disactive' => 0,
        'active' => 1
    ],
    'limit' => [
        'record' => 10,
        'advertised_offers' => 6,
        'today_offers' => 6,
        'new_offers' => 4,
        'navigation' => 4
    ],
    'status' => [
        'success' => 1,
        'fail' => 0,
        'order' => [
            'pending' => 0,
            'processing' => 1,
            'shipped' => 2,
            'received' => 3,
            'paymented' => 4
        ]
    ],
    'days_sub' => [
        'vi' => [
            'Mon' => 'Thứ hai',
            'Tue' => 'Thứ ba',
            'Web' => 'Thứ tư',
            'Thu' => 'Thứ năm',
            'Fri' => 'Thứ sáu',
            'Sat' => 'Thứ bảy',
            'Sun' => 'Chủ nhật',
        ]
    ],
    'roles' => [
        'super' => 1,
        'admin' => 2,
        'customer' => 10
    ],
    'heading' => [
        'name',
        'stock',
        'price',
        'discount_percent',
        'category_id',
        'description'
    ],
    'form' => [
        'products' => 'bieu-mau-them-moi-san-pham.xlsx'
    ],
    'socials' => [
        'google'
    ]
];
