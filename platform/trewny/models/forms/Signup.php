<?php

/*
 * Signup.php
 * 
 */

namespace trewny\models\forms;

use Yii;
use yii\base\Model;
//-
use trewny\models\Account;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */

class Signup extends Model {

    const DURACAO_SESSAO = 604800;

    /** @var string */
    public $username;

    /** @var string */
    public $password;

    /** @var string */
    public $repeatpassword;

    /** @var string */
    public $email;

    /**
     * @inheritdoc
     */
    public function rules(): array {
        return [
            [['username', 'password', 'email', 'repeatpassword'], 'required', 'message' => 'All fields are required'],
            [['username', 'repeatpassword', 'password'], 'string'],
            [['email'], 'email', 'message' => 'Not a valid email']
        ];
    }

    /**
     * @return bool
     */
    public function register(): bool {
        if(Account::findOne(['username' => $this->username])) {
            $this->addError('username', 'Username already in use');
        }

        if(Account::findOne(['email' => $this->email])) {
            $this->addError('email', 'Email already in use');
        }

        if($this->password != $this->repeatpassword) {
            $this->addError('repeatpassword', 'Passwords do not match');
        }

        if (count($this->errors) > 0) {
            $this->repeatpassword = null;
           return false;
        }

        $account = new Account();

        $account->username = $this->username;
        $account->password = Yii::$app->security->generatePasswordHash($this->password);
        $account->email = $this->email;

        if($account->save()) {
            return Yii::$app->user->login($account, self::DURACAO_SESSAO);
        }

        $this->addError('repeatpassword', 'Unknown error');

        return false;
    }

}
