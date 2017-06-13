<?php

/*
 * DashboardController.php
 * 
 */

namespace trewny\controllers;

use Yii;
use yii\filters\AccessControl;
//-
use trewny\models\forms\Authentication;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class DashboardController extends CommonController {

    /**
     * @inheritdoc
     */
    public function behaviors(): array {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['?'], 'actions' => ['login', 'error']],
                    ['allow' => true, 'roles' => ['@'], 'actions' => ['logout', 'error', 'index']],
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions(): array {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex(): string {
        return $this->render('index');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin() {
        $this->layout = 'login';

        $model = new Authentication();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                if ($model->authenticate()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

}
