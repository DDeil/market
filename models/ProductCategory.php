<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property integer    $product_id
 * @property integer    $category_id
 *
 * @property Product    $product
 * @property Category   $category
 */
class ProductCategory extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'product_category';
    }

    /**
     * @return ActiveQuery
     */
    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}