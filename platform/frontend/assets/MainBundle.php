<?php

/*
 * MainBundle.php
 * 
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class MainBundle extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/main.php',
        'css/style.php',
    ];
    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        '//yii\bootstrap\BootstrapPluginAsset'
    ];

//    public function __construct($config = []) {
//        //$this->js[] = (defined('YII_ENV') && YII_ENV == 'dev') ? 'js/scripts.js' : 'js/scripts.min.js';
//        parent::__construct($config);
//    }

}
