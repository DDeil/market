<?php

namespace app\models;

use DateTime;
use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property string     $title
 * @property string     $description
 * @property string     $image
 * @property DateTime   $create_at
 * @property integer    $status
 */

class News extends ActiveRecord
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
        return 'news';
    }

    /**
     * @return string
     */
    public function getTextStatus(): string
    {
        return self::STATUS_LIST[$this->status] ?? 'Статус не известен';
    }
}