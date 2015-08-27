<?php
namespace frontend\themes\kongoon;

use yii\web\AssetBundle;

class KongoonAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/kongoon/assets';
    public $css = [
        'css/bootstrap.css',
    ];
    public $js = [
        //'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}