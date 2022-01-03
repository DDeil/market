<?php

/**
 * @var Category[]   $categories
 */

use app\form\LinksForm;
use app\models\Category;
use app\search\LinksSearch;

$this->title = 'Главная';
?>


<div id="sidebar">
    <h3>Categories</h3>
    <ul class="sidebar_menu">
        <?php foreach ($categories as $category) { ?>
            <li><a href="/product?category=<?=$category->name?>"><?= $category->name ?></a></li>
        <?php } ?>
    </ul>
</div> <!-- END of sidebar -->

<div id="content">
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/01.jpg" alt="Product 01" /></a>
        <h3>Ut eu feugiat</h3>
        <p class="product_price">$ 100</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/02.jpg" alt="Product 02" /></a>
        <h3>Curabitur et turpis</h3>
        <p class="product_price">$ 200</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery no_margin_right">
        <a href="productdetail.html"><img src="images/product/03.jpg" alt="Product 03" /></a>
        <h3>Mauris consectetur</h3>
        <p class="product_price">$ 120</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/04.jpg" alt="Product 04" /></a>
        <h3>Proin volutpat</h3>
        <p class="product_price">$ 260</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/05.jpg" alt="Product 05" /></a>
        <h3>Aenean tempus</h3>
        <p class="product_price">$ 80</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery no_margin_right">
        <a href="productdetail.html"><img src="images/product/06.jpg" alt="Product 06" /></a>
        <h3>Nulla luctus urna</h3>
        <p class="product_price">$ 193</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/07.jpg" alt="Product 07" /></a>
        <h3>Pellentesque egestas</h3>
        <p class="product_price">$ 30</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery">
        <a href="productdetail.html"><img src="images/product/08.jpg" alt="Product 08" /></a>
        <h3>Suspendisse porttitor</h3>
        <p class="product_price">$ 220</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
    <div class="col col_14 product_gallery no_margin_right">
        <a href="productdetail.html"><img src="images/product/09.jpg" alt="Product 09" /></a>
        <h3>Nam vehicula</h3>
        <p class="product_price">$ 65</p>
        <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
    </div>
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

