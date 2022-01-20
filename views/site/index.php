<?php

/**
 * @var Category[]   $categories
 */

use app\models\Category;

$this->title = 'Главная';
?>


<div class="row">
    <div class="col-sm-3">

        <h3 style="background: url('image/sidebar_header_bg.png')no-repeat left bottom; padding-bottom: 10px">Categories</h3>
        <img src="" width="100%"/>
        <ul class="sidebar_menu">
            <?php foreach ($categories as $category) { ?>
                <li><a href="/product?ProductSearch[category][]=<?=$category->name?>"><?= $category->name ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

