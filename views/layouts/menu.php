<?php

use app\models\Category;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$categories    = Category::findAll(['status' => true]);
$categoryItems = [
        [
            'visible' => true,
            'label'   => 'Все товары',
            'url' => ['/product'],
        ],
    ];

foreach ($categories as $category) {
    $categoryItems[] = [
        'visible' => true,
        'label'   => $category->name ,
        'url' => ["/product?ProductSearch[category][]=$category->name"],
    ];
}

NavBar::begin([
    'brandLabel' => 'Just-K',
    'brandUrl' => '/',
    'options' => [
        'class' => 'navbar navbar-inverse ',

    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        [
            'label' => 'Главная',
            'url' => ['/'],
        ],
        [
            'label' => 'Каталог товаров',
            'url' => ['/product'],
            'items' => $categoryItems,
        ],
        [
            'label' => 'Контакты',
            'url' => ['/site/contact'],
        ],
    ],
]);
NavBar::end();
?>