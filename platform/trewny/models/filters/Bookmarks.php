<?php

/*
 * Bookmark.php
 *
 *
 */

namespace trewny\models\filters;

use yii\base\Model;
use yii\data\ActiveDataProvider;
//
use trewny\models\Bookmark;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
final class Bookmarks extends Model {

    /** @var string */
    public $title;

    /** @var string */
    public $link;

    /** @var string */
    public $color;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'link', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * @param array $params
     * @param integer $pageSize
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $pageSize = 50) {
        $query = Bookmark::find()
            ->orderBy('title ASC')
            ->where(['idAccount' => \Yii::$app->user->id]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pageSize],
            'sort' => false
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['like', 'Bookmark.title', trim($this->title)])
            ->andFilterWhere(['like', 'Bookmark.link', trim($this->link)])
            ->andFilterWhere(['like', 'Bookmark.color', trim($this->color)]);

        return $provider;
    }

}