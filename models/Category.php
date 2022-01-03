<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 *
 * Class Category
 * @package app\models
 *
 * @property integer    $id
 * @property string     $name
 *
 */

class Category extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'category';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            ['name', 'string', 'length' => [0, 256]],
        ];
    }
}