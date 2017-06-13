<?php

/*
 * CommonController.php
 * 
 */

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
abstract class CommonController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors(): array {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => false, 'roles' => ['?']]
                ]
            ]
        ];
    }

}
