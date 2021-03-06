<?php

namespace app\form;

use app\models\User;
use yii\base\Model;

class UserForm extends Model
{

    public $email;
    public $name;
    public $last_name;
    public $password;
    public $phone;
    public $address;






    public function rules(): array
    {
        return [
            [['name','last_name', 'address'] ,'string'],
            [['phone',] ,'integer'],
            [['email','password'], 'safe'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email'         => 'Email',
            'name'          => 'Имя',
            'last_name'     => 'Фамилия',
            'password'      => 'Пароль',
            'phone'         => 'Телефон',
            'address'       => 'Адрес',
            'type'          => 'Тип',

        ];
    }



    public function process()
    {
        $user = new User();

        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = md5($this->password);
        $user->phone = $this->phone;
        $user->address = $this->address;



        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $this->email)) {
            return false;
        }

        if (!$user->save()){
            return false;
        }
        return true;
    }


}