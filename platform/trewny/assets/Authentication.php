<?php

/*
 * Authentication.php
 * 
 */

namespace trewny\assets;

use yii\web\AssetBundle;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class Authentication extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/login.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];

}
