<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property string     $email
 * @property string     $password
 * @property string     $name
 * @property string     $last_name
 * @property string     $phone
 */

class User extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'user';
    }

}