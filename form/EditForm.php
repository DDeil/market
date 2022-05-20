<?php

namespace app\form;

use app\models\User;
use yii\base\Model;

class EditForm extends Model
{

    public $email;
    public $name;
    public $last_name;
    public $password;
    public $phone;
    public $address;
    public $type;

    private $user;

    public function rules(): array
    {
        return [
            [['email', 'password','name', 'last_name','address'], 'safe'],
            [['phone', 'type'], 'integer'],

        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email' => 'Email',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'address' => 'Адрес',

        ];
    }
    public function __construct(User $user)
    {
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->phone =$user->phone;
        $this->password =$user->password;
        $this->email =$user->email;
        $this->address = $user->address;
        $this->type = $user->type;

        $this->user = $user;

    }
    public function process()
    {
        $user = $this->user;

        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = md5($this->password);
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->type = $this->type;

        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $this->email)) {
            return false;
        }

        if (!$user->save()) {
            return false;
        }
        return true;

    }
}