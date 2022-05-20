<?php

namespace app\form;

use app\models\User;
use yii\base\Model;


class LoginForm extends Model
{
    public $email;
    public $password;
    private $user;


    public function rules(): array
    {
        return [
            [['email', 'password'], 'required'],
            ['email','email'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findOne(['email'=>$this->email,'password'=>md5($this->password)]);
        if (!$user){
            $this->addError($attribute,'Пароль или Email введен не верно');
        }
        $this->user = $user;
    }

    public function attributeLabels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    public function process()
    {
       return \Yii::$app->user->login($this->user);
    }

}
