<?php
$routes = [];
//通用模块路由
$routes[] = [
    'class'         => 'yii\rest\UrlRule',
    'controller'    => ['user'],
    'pluralize'     => FALSE,
    'extraPatterns' => [
        'GET search/<keyword:\w+>'    => 'search',
    ],
];

return $routes;
