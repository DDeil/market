<?php

namespace app\modules\adm\forms;

use app\models\Product;
use app\models\ProductCategory;
use yii\base\Model;

class AddProductForm extends Model
{

    public $title;
    public $description;
    public $categoryIds;
    public $status;
    public $type;
    public $price;
    public $is_hit;
    public $is_new;
    public $image;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['title', 'description', 'categoryIds', 'status', 'type', 'price', 'is_hit', 'is_new', 'image'], 'safe']
        ];
    }

    public function attributeLabels()
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
     * @return bool
     */
    public function process(): bool
    {
        $documentFileName = $this->image ? (new \DateTime())->format('Ymd_His_u') . '.' . $this->image->extension : null;

        $product = new Product();
        $product->title       = $this->title;
        $product->description = $this->description;
        $product->price       = $this->price;
        $product->status      = $this->status;
        $product->type        = $this->type;
        $product->is_hit      = $this->is_hit;
        $product->is_new      = $this->is_new;
        $product->image       = $documentFileName;

        $isSave = $product->save();

        if (!$isSave) {
            return false;
        }

        foreach ($this->categoryIds as $categoryId) {
            $this->createProductCategory($categoryId, $product->id);
        }

        if ($documentFileName) {
            $path = '@app/web/image/product/' . $documentFileName;
            $path = \Yii::getAlias($path);

            $this->image->saveAs($path);
        }
        return true;
    }

    private function createProductCategory($categoryId, int $productId)
    {
        $productCategory = new ProductCategory();

        $productCategory->category_id = $categoryId;;
        $productCategory->product_id  = $productId;

        $productCategory->save();
    }
}