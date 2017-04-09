<?php

namespace yiip\ace\web;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin Extra client script files
 */
class AceExtraAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/cornernote-ace/assets';
    public $js = [
        'js/ace-extra.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];
}
