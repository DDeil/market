<?php

use dmstr\widgets\Menu;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

?>

<aside class="main-sidebar no-animate">
    <section class="sidebar">
        <div class = "sidebar-form">
            <?php $form = ActiveForm::begin(['action' => Url::to(['/adm/offer']), 'method' => 'GET']); ?>
            <div class="input-group">
                <input type="text" name="'sadf[name_filter]' ?>" class="form-control" placeholder="Поиск...">
                <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <?= Menu::widget(
            [
                'encodeLabels' => false,
                'options' => [
                    'class' => 'sidebar-menu tree',
                    'data-widget' => 'tree'
                ],
                'items' => [
                    [
                        'label' => 'Товары',
//                        'icon' => 'line-chart',
                        'icon' => 'money',
                        'url' => ['/adm/product/list'],
                        'visible' => true,
                    ],
                    [
                        'label' => 'Категории',
                        'icon' => 'group',
                        'url' => ['/adm/category/list'],
                        'visible' => true,
                    ],
                    [
                        'label' => 'Новости',
                        'icon' => 'newspaper-o',
                        'url' => ['/adm/news/list'],
                        'visible' => true,
                    ],
                    [
                        'visible' => true,
                        'label'   => 'Настройка бота',
                        'icon' => 'group',
                        'url'     => '#',
                        'items'   => [
                            [
                                'visible' => true,
                                'label'   => 'Подключение бота',
                                'icon' => 'android',
                                'url' => ['/adm/bot-setting/connect'],
                            ],
                            [
                                'visible' => true,
                                'label'   => 'Вебмастера',
                                'icon' => 'android',
                                'url' => ['/adm/bot-setting/user'],
                            ],
                            [
                                'visible' => true,
                                'label'   => 'Показатели общие',
                                'icon' => 'android',
                                'url' => ['/adm/bot-setting/indicator'],
                            ],
                            [
                                'visible' => true,
                                'label'   => 'Показатели индивид.',
                                'icon' => 'android',
                                'url' => ['/adm/bot-setting/indicator-user'],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>