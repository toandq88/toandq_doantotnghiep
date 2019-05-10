<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'toandq/css/bootstrap.min.css',
        'toandq/css/sb-admin.css',
        'toandq/css/plugins/morris.css',
        'toandq/font-awesome-4.1.0/css/font-awesome.min.css',
    ];
    public $js = [
        //'/toandq/js/jquery-1.11.0.js',
        //'/toandq/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
