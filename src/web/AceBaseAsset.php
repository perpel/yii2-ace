<?php

namespace yiip\ace\web;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin client script files
 */
class AceBaseAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/cornernote-ace/assets';

    public $css = [
        //['css/bootstrap.min.css'],
        ['font-awesome/4.2.0/css/font-awesome.min.css'],
        ['css/fonts.googleapis.com.css'],
        ['css/ace.min.css', 'class' => 'ace-main-stylesheet', 'id' => 'main-ace-style'],
        ['css/ace-part2.min.css', 'class' => 'ace-main-stylesheet', 'condition' => 'lte IE 9'],
        ['css/ace-skins.min.css'],
        ['css/ace-rtl.min.css'],
        ['css/ace-ie.min.css'],

    ];

    public $js = [
        ['js/ace-extra.min.js', 'position' => \yii\web\view::POS_HEAD],
        ['js/html5shiv.min.js', 'condition' => 'lte IE 8', 'position' => \yii\web\view::POS_HEAD],
        ['js/respond.min.js', 'condition' => 'lte IE 8', 'position' => \yii\web\view::POS_HEAD],
        ['js/jquery-1.11.3.min.js', 'condition' => 'IE'],
        ['js/excanvas.min.js', 'condition' => 'lte IE 8'],
        ['js/jquery-ui.custom.min.js'],
        ['js/jquery.ui.touch-punch.min.js'],
        ['js/jquery.easypiechart.min.js'],
        ['js/jquery.sparkline.index.min.js'],
        ['js/jquery.flot.min.js'],
        ['js/jquery.flot.pie.min.js'],
        ['js/jquery.flot.resize.min.js'],
        ['js/ace-elements.min.js'],
        ['js/ace.min.js']
    ];
}
