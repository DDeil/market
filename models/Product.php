<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer            $id
 * @property string             $title
 * @property string             $description
 * @property float              $price
 * @property integer            $category_id
 * @property string             $image
 * @property boolean            $is_hit
 * @property boolean            $is_new
 * @property integer            $type
 * @property integer            $status
 *
 * @property Category           $category
 * @property ProductCategory    $productCategory
 */

class Product extends ActiveRecord
{

    public const TYPE_RESEND_LUCKY = 1;
    public const TYPE_PRODUCT      = 2;

    public const TITLE_TYPE_RESEND_LUCKY = 'Переотправка';
    public const TITLE_TYPE_PRODUCT      = 'Продукт';

    public const TYPE_LIST = [
        self::TYPE_RESEND_LUCKY => self::TITLE_TYPE_RESEND_LUCKY,
        self::TYPE_PRODUCT      => self::TITLE_TYPE_PRODUCT,
    ];

    public const STATUS_ACTIVE  = 1;
    public const STATUS_ARCHIVE = 2;

    public const TITLE_STATUS_ACTIVE  = 'Активный';
    public const TITLE_STATUS_ARCHIVE = 'Архив';

    public const STATUS_LIST = [
        self::STATUS_ACTIVE  => self::TITLE_STATUS_ACTIVE,
        self::STATUS_ARCHIVE => self::TITLE_STATUS_ARCHIVE,
    ];

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'product';
    }

    /**
     * @return ActiveQuery
     */
    public function getProductCategory(): ActiveQuery
    {
        return $this->hasOne(ProductCategory::class, ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id'])->via('productCategory');
    }
}