<?php

namespace app\modules\adm\forms;

use app\models\User;
use yii\base\Model;

class AddUserForm extends Model
{
    public $email;
    public $name;
    public $last_name;
    public $password;
    public $phone;



    public function rules(): array
    {
       return [
           [['name','last_name'] ,'string'],
           [['phone'] ,'integer'],
           [['email','password'], 'safe'],
           ];
    }

    public function attributeLabels(): array
    {
        return [
            'email'         => 'email',
            'name'          => 'Имя',
            'last_name'     => 'Фамилия',
            'password'      => 'Пароль',
            'phone'         => 'Телефон',

        ];
    }

    public function process()
    {
        $user = new User();

        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = md5($this->password);
        $user->phone= $this->phone;


        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $this->email)) {
            return false;
        }

        if (!$user->save()){
            return false;
        }
        return true;
    }

}