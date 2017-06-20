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
        ];
    }

}