<?php

namespace app\modules\adm\forms;

use app\models\Product;
use app\models\ProductCategory;
use yii\base\Model;

class EditProductForm extends Model
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

    private $product;
    private $categoryId;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['title', 'description', 'categoryIds', 'status', 'type', 'price', 'is_hit', 'is_new', 'image'], 'safe']
        ];
    }

    public function __construct(Product $product)
    {
        $this->title       = $product->title;
        $this->description = $product->description;
        $this->price       = $product->price;
        $this->status      = $product->status;
        $this->type        = $product->type;
        $this->is_hit      = $product->is_hit;
        $this->is_new      = $product->is_new;
        $this->categoryIds = $product->category;

        $this->product = $product;
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
        $imageFileName = $this->image ? (new \DateTime())->format('Ymd_His_u') . '.' . $this->image->extension : null;

        $productModel = $this->product;

        $productModel->title       = $this->title;
        $productModel->description = $this->description;
        $productModel->price       = $this->price;
        $productModel->status      = $this->status;
        $productModel->type        = $this->type;
        $productModel->is_hit      = $this->is_hit;
        $productModel->is_new      = $this->is_new;


        if (!empty($imageFileName) && !empty($productModel->image)){
            $path = '@app/web/image/product/' . $productModel->image;
            $path = \Yii::getAlias($path);
            try {
                unlink($path);
            }catch (\Throwable $exception) {
                \Yii::$app->getSession()->addFlash('error', $exception->getMessage());
            }
        }

        if (!empty($imageFileName)) {
            $productModel->image = $imageFileName;
        }

        $isSave = $productModel->save();

        if (!$isSave) {
            return false;
        }

        if (is_array($this->categoryIds)) {
            foreach ($this->categoryIds as $categoryId) {
                $this->createProductCategory($categoryId, $productModel->id);
            }
        }

        ProductCategory::deleteAll([
            'and',
            ['product_id' => $productModel->id],
            ['not in','category_id', $this->categoryIds],
        ]);

        if ($imageFileName) {
            $path = '@app/web/image/product/' . $imageFileName;
            $path = \Yii::getAlias($path);

            $this->image->saveAs($path);
        }
        return true;
    }

    private function createProductCategory($categoryId, int $productId)
    {
        $isExists = ProductCategory::find()->where(['product_id' => $productId, 'category_id' => $categoryId])->exists();
        if (!$isExists) {
            $productCategory = new ProductCategory();
            $productCategory->product_id = $productId;
            $productCategory->category_id = $categoryId;

            $productCategory->save();
        }
    }
}