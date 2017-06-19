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
 * @property int $idAccount
 * 
 * @property Account $account
 *
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Bookmark extends ActiveRecord {

    public static function tableName() {
        return 'Bookmark';
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount() {
        return $this->hasOne(Account::className(), ['id' => 'idAccount']);
    }
}