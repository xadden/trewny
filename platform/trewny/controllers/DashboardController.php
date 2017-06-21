<?php

/*
 * DashboardController.php
 * 
 */

namespace trewny\controllers;

use trewny\models\Bookmark;
use Yii;
use yii\filters\AccessControl;
//-
use trewny\models\forms\Authentication;
use trewny\models\forms\Signup;

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
                    ['allow' => true, 'roles' => ['?'], 'actions' => ['login', 'register', 'error']],
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
        $bookmarks = Bookmark::find()->where(['idAccount' => Yii::$app->user->id])->all();
        return $this->render('index', ['bookmarks' => $bookmarks]);
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

    public function actionRegister() {
        $this->layout = 'login';

        $model = new Signup();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                if ($model->register()) {
                    return $this->redirect(['index']);
                }
            }
        }


        return $this->render('register', ['model' => $model]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

}
