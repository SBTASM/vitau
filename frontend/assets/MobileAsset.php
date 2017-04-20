<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MobileAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/slicknav.min.css',
        'css/mobile.css',
    ];
    public $js = [
        'js/jquery.flexslider.js',
        'js/clipboard.min.js',
        'js/jquery.slicknav.min.js',
        'js/mobile.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
