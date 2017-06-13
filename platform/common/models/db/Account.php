<?php

/*
 * Account.php
 *
 */

namespace common\models\db;

use \yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $password
 *
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Account extends ActiveRecord {

    public static function tableName() {
        return 'Account';
    }
}