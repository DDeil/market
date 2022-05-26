<?php

namespace app\models;

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
 * @property integer    $type
 *
 * @property Order        [] $orders
 * @property Product      [] $products
 * @property ProductOrder [] $productOrders
 * @property User         [] $user
 */


class User extends ActiveRecord implements IdentityInterface
{
    public const TYPE_DIRECTOR  = 1;
    public const TYPE_ADM       = 2;
    public const TYPE_USER      = 3;

    public const    TITLE_TYPE_DIRECTOR = 'Админ';
    public const    TITLE_TYPE_ADM      = 'Сотрудник';
    public const    TITLE_TYPE_USER     = 'Пользователь';

    public const TYPE_LIST = [
        self::TYPE_ADM      => self::TITLE_TYPE_ADM,
        self::TYPE_USER     => self::TITLE_TYPE_USER,
    ];

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
            'type'          => 'Вид деятельности',
        ];
    }

    public function rules(): array
    {
        return [
            [['name','last_name'] ,'string'],
            [['phone','id','type'] ,'integer'],
            [['email','password','address'], 'safe'],
        ];
    }

    public function getTextType(): string
    {
        return self::TYPE_LIST[$this->type] ?? self::TITLE_TYPE_DIRECTOR;
    }

    public function  getOrders()
    {
        return $this->hasMany(Order::class,['user_id'=>'id']);
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