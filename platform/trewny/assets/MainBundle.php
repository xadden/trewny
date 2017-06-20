<?php

/*
 * MainBundle.php
 * 
 */

namespace trewny\assets;

use yii\web\AssetBundle;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class MainBundle extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
        'css/main.css',
        'css/style.css',
    ];
    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

//    public function __construct($config = []) {
//        //$this->js[] = (defined('YII_ENV') && YII_ENV == 'dev') ? 'js/scripts.js' : 'js/scripts.min.js';
//        parent::__construct($config);
//    }

}
