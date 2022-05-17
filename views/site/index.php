<?php

/**
 * @var Category[]   $categories
 * @var News
 */

use app\models\Category;
use app\models\News;


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
    <div class="col-sm-9">
        <wrapper>
            <div id="dws-slider" class="carousel slide" data-ride="carousel">
                <!--Показатели-->
                <ol class="carousel-indicators">
                    <?php $isActive = true; ?>
                    <?php foreach ($news as $newstId) {?>
                        <li data-target="#dws-slider" data-slide-to="<?=$newstId->id; ?>" <?= $isActive?'class="active':null ?>"></li>
                        <?php $isActive = false; ?>
                    <?php } ?>
                </ol>

                <!--Обертка для слайдов-->

                <div class="carousel-inner" role="listbox">

                    <?php $isActive = true; ?>
                    <?php foreach ($news as $oneNews) {?>
                            <?php /** @var $oneNews News */?>
                        <div class="item <?= $isActive?'active':null ?>"><img src="/image/news/<?=$oneNews->image;?>" alt="Картинка 1">
                            <div class="carousel-caption">
                                <h3 class="text-uppercase"><?=$oneNews->title;?></h3>
                                <p><?=$oneNews->description;?></p>
                            </div>
                        </div>
                        <?php $isActive = false; ?>
                    <?php } ?>

                </div>

                <!--Элементы управления-->
                <a class="left carousel-control" href="#dws-slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#dws-slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>






        </wrapper>



        <script>
            $('.carousel').carousel({
                interval: 6000
            })
        </script>
    </div>
</div>

