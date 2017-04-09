<?php

namespace yiip\ace\web;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin client script files
 */
class AceAsset extends AssetBundle
{
    public $sourcePath = '@vendor/perpel/yii2-ace/src/assets';
    public $css = [
        //'css/ace_yii.css',
    ];
    public $js = [
        //'js/ace_yii.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yiip\ace\web\AceBaseAsset',
        'yiip\ace\web\AceExtraAsset'
    ];
}
