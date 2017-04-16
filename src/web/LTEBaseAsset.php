<?php

namespace yiip\lte\web;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin client script files
 */
class LTEBaseAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/admin-lte';

    public $css = [
        ['plugins/jvectormap/jquery-jvectormap-1.2.2.css'],
        ['dist/css/AdminLTE.min.css'],
        ['dist/css/skins/_all-skins.min.css'],
    ];

    public $js = [
        ['bootstrap/js/bootstrap.min.js'],
        ['plugins/fastclick/fastclick.js'],
        ['dist/js/app.min.js'],
        ['plugins/sparkline/jquery.sparkline.min.js'],
        ['plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'],
        ['plugins/jvectormap/jquery-jvectormap-world-mill-en.js'],
        ['plugins/slimScroll/jquery.slimscroll.min.js'],
        ['plugins/chartjs/Chart.min.js'],
        //['dist/js/pages/dashboard2.js'],
        //['dist/js/demo.js'],
    ];
}
