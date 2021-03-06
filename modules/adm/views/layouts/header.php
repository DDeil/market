<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $user \app\models\User */

$user = Yii::$app->user->identity;
$userEmail = Html::encode($user->email);

$requestCount = 2;
$tiketCount = 3;
?>

<header class="main-header">


    <?= Html::a('<span class="logo-mini">JK</span><span class="logo-lg">Just-K</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="messages-menu <?= (Yii::$app->controller->id == 'webmaster' && Yii::$app->controller->action->id == 'list')?'active':''?>">
                    <a href="<?=Url::to(['/adm/webmaster/list'])?>" title="Веб мастера">
                        <i class="fa fa-dashboard"></i>
                    </a>
                </li>
                <li class="messages-menu <?= (Yii::$app->controller->id == 'offer' && Yii::$app->controller->action->id == 'list')?'active':''?>">
                    <a href="<?=Url::to(['/adm/offer/list'])?>" title="Все офферы">
                        <i class="fa fa-th-list"></i>
                    </a>
                </li>
                <?php if($tiketCount > 0) {?>
                    <li class="messages-menu <?= (Yii::$app->controller->id == 'tickets' && Yii::$app->controller->action->id == 'index')?'active':''?>">
                        <a href="<?=Url::to(['/adm/tickets'])?>" title="Тикеты">
                            <i class="fa fa-comments-o"></i>
                            <span class="label label-success"><?=$tiketCount?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if($requestCount > 0) {?>
                    <li class="messages-menu <?= (Yii::$app->controller->id == 'offer' && Yii::$app->controller->action->id == 'requests')?'active':''?>">
                        <a href="<?=Url::to(['offer/requests'])?>" title="Запросы">
                            <i class="fa fa-key"></i>
                            <span class="label label-success"><?=$requestCount?></span>
                        </a>
                    </li>
                <?php } ?>
                <li class="dropdown user user-menu">
                    <a href="<?= Url::to(['user/more', 'id' => $user->id])?>" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="#" alt="<?= $userEmail ?>">
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="#" class="img-circle" alt="User Image"/>
                            <p>
                                <a href="<?= Url::to(['user/more', 'id' => $user->id])?>" ><?= $userEmail ?></a>
                                <small><?=$user->name?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выйти',
                                    Url::to(['/user/logout', 'id' => Yii::$app->getUser()->id]),
                                    [ 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>