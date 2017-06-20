<?php

/*
 * BookmarkController.php
 * 
 */

namespace trewny\controllers;

use trewny\models\filters\Bookmarks;
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
        $filter = new Bookmarks();
        return $this->render('index', ['filter' => $filter]);
    }

    public function actionView($id): string {
        if (!($bookmark = Bookmark::findOne($id))) {
            $this->redirect('index');
        }

        if ($bookmark->idAccount != Yii::$app->user->id) {
            $this->redirect('index');
        }

        return $this->render('view', ['bookmark' => $bookmark]);
    }
    
    public function actionAdd() {
        $model = new FormBookmark();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['dashboard/index']);
            }
        }

        return $this->render('add', ['model' => $model]);
    }
    
    public function actionUpdate(int $id) {
        if (!($bookmark = Bookmark::findOne($id))) {
            $this->redirect('index');
        }

        if ($bookmark->idAccount != Yii::$app->user->id) {
            $this->redirect('index');
        }

        $model = new FormBookmark($bookmark);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['bookmark/view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * @param int $id
     */
    public function actionDelete(int $id) {
        if(!($bookmark = Bookmark::findOne($id))) {
            return $this->redirect('index');
        }

        if ($bookmark->idAccount != Yii::$app->user->id) {
            $this->redirect('index');
        }

        $bookmark->delete();

        return $this->redirect('index');
    }
    
    public function actionImage($id) {
        $bookmark = Bookmark::findOne($id);

        if ($bookmark->idAccount != Yii::$app->user->id) {
            $this->redirect('index');
        }

        $path = $bookmark->pathImage();
        if (is_readable($path)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path);
            finfo_close($finfo);

            header('Content-Type: ' . $mime);
            header('Content-Length: ' . filesize($path));
            readfile($path);
        }
        Yii::$app->end();
    }
}