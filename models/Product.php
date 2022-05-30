<?php

namespace app\models;

use DateTime;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


/**
 * @property integer            $id
 * @property string             $title
 * @property string             $description
 * @property float              $price
 * @property string             $image
 * @property boolean            $is_hit
 * @property boolean            $is_new
 * @property integer            $type
 * @property integer            $status
 * @property DateTime           $create_at
 * @property                    $categorys
 *
 * @property Category           $category
 * @property ProductCategory    $productCategory
 * @property ProductOrder       $countProduct
 * @property Promotion[]        $promo
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

    public function rules()
    {
        return [
            [['title', 'description','categorys'], 'string'],
            [['price','type', 'status'], 'integer'],
            [['is_hit', 'is_new'], 'boolean'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'title'       => 'Название',
            'description' => 'Описание',
            'categoryIds' => 'Категории',
            'status'      => 'Статус',
            'type'        => 'Тип',
            'price'       => 'Цена',
            'is_hit'      => 'Хит',
            'is_new'      => 'Новый',
            'image'       => 'Изображение',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProductCategory(): ActiveQuery
    {
        return $this->hasMany(ProductCategory::class, ['product_id' => 'id']);
    }


    /**
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('productCategory');
    }

    public function getTextStatus(): string
    {
        return self::STATUS_LIST[$this->status] ?? 'Статус не известен';
    }

    public function getPromo(): ActiveQuery
    {
        $currentDate = (new DateTime())->format('Y-m-d');

        return $this->hasMany(Promotion::class, ['product_id' => 'id'])->onCondition(['<=', 'date_begin', $currentDate])->andOnCondition(['>=', 'date_end', $currentDate]);
    }

}