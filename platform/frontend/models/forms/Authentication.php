<?php

/*
 * Authentication.php
 * 
 */

namespace frontend\models\forms;

use Yii;
use yii\base\Model;
//-
use frontend\models\Account;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */

class Authentication extends Model {

    const DURACAO_SESSAO = 604800;

    /** @var string */
    public $username;

    /** @var string */
    public $password;

    /**
     * @inheritdoc
     */
    public function rules(): array {
        return [
            [['username', 'password'], 'required', 'message' => 'Can\'t be empty'],
            [['username'], 'string']
        ];
    }

    /**
     * @return bool
     */
    public function authenticate(): bool {
        $account = Account::findOne(['username' => $this->username]);

        if ($account) {
            if ($account->isPasswordValid($this->password)) {
                return Yii::$app->user->login($account, self::DURACAO_SESSAO);
            }
        }

        $this->addError('password', 'Unknown username or wrong password');

        return false;
    }

}
