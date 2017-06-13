<?php

/*
 * Conta.php
 * 
 */

namespace frontend\models;

use Yii;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Account extends \common\models\db\Account implements \yii\web\IdentityInterface {

    /** @var string */
    public $hashed;

    /**
     * @param string $password
     * @return bool
     * 
     * @throws \yii\base\InvalidParamException
     */
    public function isPasswordValid(string $password): bool {
        return Yii::$app->security->validatePassword($password, $this->hashed);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthKey(): string {
        return md5($this->id . $this->email . $this->hashed);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function validateAuthKey($authKey): bool {
        return $authKey == $this->getAuthKey();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentity($id) {
        return self::findOne((int) $id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public function afterFind() {
        $this->hashed = $this->password;
        $this->password = null;

        parent::afterFind();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if (!empty($this->password)) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            } else if (!empty($this->hashed)) {
                $this->password = $this->hashed;
            }

            return true;
        }

        return false;
    }

}
