<?php

/*
 * Bookmark.php
 *
 */

namespace common\models\db;

use \yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property string $color
 *
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Bookmark extends ActiveRecord {

    public static function tableName() {
        return 'Bookmark';
    }
}