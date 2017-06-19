<?php

/*
 * BookmarkController.php
 * 
 */

namespace trewny\controllers;

use Yii;
use yii\filters\AccessControl;
//-
use trewny\models\Bookmark;
use trewny\models\forms\Bookmark as FormBookmark;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class BookmarkController extends CommonController {

    /**
     * @inheritdoc
     */
    public function behaviors(): array {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['@']]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex(): string {
        $bookmarks = Bookmark::find()->all();
        return $this->render('index', ['bookmarks' => $bookmarks]);
    }
    
    public function actionAdd() {
        $model = new FormBookmark();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('add', ['model' => $model]);
    }
    
    public function actionUpdate(int $id): string {
        return $this->render('update');
    }
    
    public function actionDelete(int $id): string {
        $bookmark = Bookmark::findOne($id)->delete();
        return $this->redirect('index');
    }
}