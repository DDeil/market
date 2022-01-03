<?php

/**
 *
 * @var Category[]      $categories
 * @var Product[]       $products
 * @var ProductSearch   $searchForm
 *
 */

use app\models\Category;
use app\models\Product;
use app\models\search\ProductSearch;
use yii\helpers\Html;

$this->title = 'Главная';
?>

<div id="sidebar">
    <?= Html::beginForm('/product', 'get') ?>
    <h3>Категории</h3>

    <div class="sidebar_menu">
        <?= Html::dropDownList('category', $searchForm->category, array_combine(array_column($categories,'name'), array_column($categories,'name'))) ?>
    </div>
    <h3>Название</h3>
    <div class="sidebar_menu">
        <?= Html::textInput('title', $searchForm->title) ?>
    </div>
    <h3>Цена</h3>
    <div class="sidebar_menu">
        <label>От:</label>
        <?= Html::textInput('priceFrom', $searchForm->priceFrom) ?>
        <label>До:</label>
        <?= Html::textInput('priceFrom', $searchForm->priceTo) ?>
    </div>
    <div id="newsletter">
        <?= Html::submitButton('Найти', ['class' => 'subscribebtn submitbtn']) ?>
    </div>
    <?= Html::endForm() ?>
</div> <!-- END of sidebar -->

<div id="content">
    <?php foreach ($products as $product) { ?>
        <div class="col col_14 product_gallery">
            <a href="productdetail.html"><img src="images/product/01.jpg" alt="Product 01" /></a>
            <h3><?= $product->title ?></h3>
            <p class="product_price">$ <?= $product->price ?></p>
            <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
        </div>
    <?php } ?>
</div>

<div id="product_slider">
    <div id="SlideItMoo_outer">
        <div id="SlideItMoo_inner">
            <div id="SlideItMoo_items">
                <div class="SlideItMoo_element">
                    <a href="#slide1" target="_parent">
                        <img src="images/gallery/01.jpg" alt="product 1" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide2" target="_parent">
                        <img src="images/gallery/02.jpg" alt="product 2" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide3" target="_parent">
                        <img src="images/gallery/03.jpg" alt="product 3" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide4" target="_parent">
                        <img src="images/gallery/04.jpg" alt="product 4" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide5" target="_parent">
                        <img src="images/gallery/05.jpg" alt="product 5" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide6" target="_parent">
                        <img src="images/gallery/06.jpg" alt="product 6" /></a>
                </div>
                <div class="SlideItMoo_element">
                    <a href="#slide6" target="_parent">
                        <img src="images/gallery/07.jpg" alt="product 7" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cleaner"></div>

