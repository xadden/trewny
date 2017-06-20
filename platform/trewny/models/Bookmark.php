<?php
/**
 * Bookmark.php
 *
 */

namespace trewny\models;


class Bookmark extends \common\models\db\Bookmark
{
    public function attributeLabels() {
        return [
            'title' => 'title',
            'link' => 'link',
            'color' => 'color',
            'image' => 'image'
        ];
    }
    
    public function pathImage() {
        if (empty($this->image)) {
            return null;
        }

        $path = Yii::$app->params['data'] . DIRECTORY_SEPARATOR . 'bookmarks' . DIRECTORY_SEPARATOR . $bookmark->image;
        if (!is_file($path)) {
            return null;
        }

        return $path;
    }

}