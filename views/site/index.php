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
                    <li data-target="#dws-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#dws-slider" data-slide-to="1"></li>
                </ol>

                <!--Обертка для слайдов-->
                <div class="carousel-inner" role="listbox">
                    <div class="item active"><img src="https://dwstroy.ru/lessons/les3649/demo/img/slider-1.jpg" alt="Картинка 1">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Адаптивный слайдер</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet elit lorem, ac congue mi
                                eleifend sit amet. Sed dignissim viverra neque a tristique.</p>
                        </div>
                    </div>
                    <div class="item"><img src="https://dwstroy.ru/lessons/les3649/demo/img/slider-2.jpg" alt="Картинка 2">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Анимированная прокрутка</h3>
                            <p>Aenean cursus imperdiet erat sit amet facilisis. Phasellus congue, sem in consectetur accumsan,
                                tellus risus sollicitudin mauris, quis ornare libero magna eget ex.</p>
                        </div>
                    </div>
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

