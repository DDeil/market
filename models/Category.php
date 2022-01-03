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
 * @property boolean    $status
 *
 */

class Category extends ActiveRecord
{

    public const STATUS_ACTIVE     = 1;
    public const STATUS_NOT_ACTIVE = 0;

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
            ['status', 'boolean'],
        ];
    }
}