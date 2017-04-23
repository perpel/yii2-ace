<?php

namespace yiip\lte\web;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin client script files
 */
class LTEAsset extends AssetBundle
{
    public $sourcePath = '@vendor/perpel/yii2-lte/src/assets';
    public $css = [
        //'css/ace_yii.css',
    ];
    public $js = [
        'js/lte-yii.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yiip\lte\web\LTEBaseAsset',
        'yiip\lte\web\LTEExtraAsset'
    ];

}
