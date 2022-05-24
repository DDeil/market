<?php

/**
 *
 * @var Category[] $categories
 * @var Product[] $products
 * @var ProductSearch $searchForm
 *
 */

use app\models\Category;
use app\models\Product;
use app\models\search\ProductSearch;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Главная';
?>
<div class="row">
    <div class="container">
        <div class="col-sm-3">
            <h3 style="background: url('image/sidebar_header_bg.png')no-repeat left bottom; padding-bottom: 10px">
                Фильтр</h3>
            <?php $form = ActiveForm::begin(['action' => '/product', 'method' => 'get']) ?>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($searchForm, 'category')->widget(
                        Select2::class,
                        [
                            'data' => array_combine(array_column($categories, 'name'), array_column($categories, 'name')),
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options' => [
                                'placeholder' => 'Категории',
                                'multiple' => true,
                            ],
                        ]
                    ) ?>

                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div style="background: url('image/sidebar_header_bg.png')no-repeat left bottom; padding-bottom: 10px"></div>
                    <?= $form->field($searchForm, 'title') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div style="background: url('image/sidebar_header_bg.png')no-repeat left bottom; padding-bottom: 10px"></div>
                    <?= $form->field($searchForm, 'priceFrom') ?>
                </div>
                <div class="col-sm-12">
                    <?= $form->field($searchForm, 'priceTo') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div style="background: url('image/sidebar_header_bg.png')no-repeat left bottom; padding-bottom: 10px"></div>
                    <?= Html::submitButton('Найти', ['class' => 'btn btn-success pull-right']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-sm-4 col-lg-4">
                        <div style="text-align:center; margin-bottom: 10px; padding-bottom: 10px; width: 100%; height: 250px"
                             class="btn-default">
                            <p><?= $product->title ?></p>
                            <a href="<?= Url::to(['detail', 'id' => $product->id]) ?>"><img
                                        src="image/product/<?= $product->image ?>" height="50%"/></a>
                            <p class="bg-light-blue">$ <?= $product->price ?></p>
                            <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>"
                               class="btn btn-sm btn-warning add-to-cart"><img src="image/cart.png" width="20%"/> В
                                корзину</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

