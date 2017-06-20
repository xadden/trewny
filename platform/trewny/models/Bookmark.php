<?php
/**
 * Bookmark.php
 *
 */

namespace trewny\models;

use Yii;


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

        $path = Yii::$app->params['data'] . DIRECTORY_SEPARATOR . 'bookmarks' . DIRECTORY_SEPARATOR . $this->image;
        if (!is_file($path)) {
            return null;
        }

        return $path;
    }

    public function afterDelete() {
        $name = $this->image;

        unlink(Yii::$app->params['data'] . DIRECTORY_SEPARATOR . 'bookmarks' . DIRECTORY_SEPARATOR . $name);
    }

}