<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property integer    $id
 * @property string     $email
 * @property string     $password
 * @property string     $name
 * @property string     $last_name
 * @property string     $phone
 * @property string     $address
 * @property string     $operator
 *
 * @property Order        [] $orders
 * @property Product      [] $products
 * @property ProductOrder [] $productOrders
 * @property User         [] $user
 */


class User extends ActiveRecord implements IdentityInterface
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'user';
    }

    public function attributeLabels() : array
    {
        return [
            'email'         => 'Email',
            'name'          => 'Имя',
            'last_name'     => 'Фамилия',
            'password'      => 'Пароль',
            'phone'         => 'Телефон',
            'address'       => 'Адресс',
        ];
    }

    public function rules(): array
    {
        return [
            [['name','last_name'] ,'string'],
            [['phone','id'] ,'integer'],
            [['email','password','address'], 'safe'],
        ];
    }



    public function  getOrders()
    {
        return $this->hasMany(Order::class,['user_id'=>'id']);
    }

    public function  getUser()
    {
        return $this->hasOne(User::class,['id'=>'id']);
    }

    public function  getProductOrders()
    {
        return $this->hasMany(ProductOrder::class,['order_id'=>'id'])->via('order');
    }



    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id ;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}