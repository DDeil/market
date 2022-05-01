<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\adm\forms\search\ProductSearch;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container" style="padding-top: 0px">
            <div class="row">
                <div class="col-sm-3" style="text-align: center">
                    <h1>Just-K</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <?php if (Yii::$app->user->isGuest){?>
                            <a href="<?=Url::to(['user/login'])?>" class="btn btn-sm btn-default">Войти</a> |
                            <a href="<?=Url::to(['user/registration'])?>" class="btn btn-sm btn-default">Регистрация</a>
                        <?php }else{ ?>
                            <?= Html::a(
                                'Профиль',
                                Url::to(['/user/user', 'id' => Yii::$app->getUser()->id]),
                                [ 'class' => 'btn btn-default btn-flat']
                            ) ?>
                            <?= Html::a(
                                'Выйти',
                                Url::to(['/user/logout', 'id' => Yii::$app->getUser()->id]),
                                [ 'class' => 'btn btn-default btn-flat']
                            ) ?>
                         <?php }?>
                    </div>
                </div>
            </div>
            <?= $this->render('menu') ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>