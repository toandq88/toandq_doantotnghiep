<?php
use yii\web\Request;
$baseUrl = str_replace('frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'vi',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    
    'name'=>'VEC-VBMS',
    
    'modules' => [      //Bổ sung để export
        'gridview' => [
            'class' => 'kartik\grid\Module',
            // other module settings
        ]
    ],
    
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
//        'request'=>[
//            'baseUrl' => $baseUrl
//        ],
        
        'urlManager' => [
//            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        //Tự viết thêm cái này là các hàm dùng chung
        'toandq' => [
            'class' => 'frontend\components\MyComponent'
        ],
    ],
    'params' => $params,
    
    /*'container' => [      //Tất cả các phân trang đều có trang đầu và trang cuối
        'definitions' => [
            'yii\widgets\LinkPager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
            ]
        ]
    ]*/
];
