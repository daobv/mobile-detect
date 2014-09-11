<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'),
    array(
        'components' => array(
            // uncomment the following to enable URLs in path-format
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    'dang-nhap' => 'user/login',
                    'dang-xuat' => 'user/logout',
                    'file/admin' => 'file/admin',
                    'file/create' => 'file/create',
                    'file/<slug>' => 'file/index',
                    'file/<slug>/<type>' => 'file/download',
                ),
            ),
        )
    )
);
