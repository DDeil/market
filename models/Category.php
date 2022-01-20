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

    public const TITLE_STATUS_ACTIVE     = 'Активный';
    public const TITLE_STATUS_NOT_ACTIVE = 'Не активнй';

    public const STATUS_LIST = [
        self::STATUS_ACTIVE     => self::TITLE_STATUS_ACTIVE,
        self::STATUS_NOT_ACTIVE => self::TITLE_STATUS_NOT_ACTIVE,
    ];

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

    /**
     * @return string
     */
    public function getTextStatus(): string
    {
        return self::STATUS_LIST[$this->status] ?? 'Статус не известен';
    }
}