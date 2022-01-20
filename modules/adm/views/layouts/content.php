<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(\yii\helpers\Inflector::id2camel($this->context->module->id));
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Модуль</small>' : '';
                } ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Главная',
                'url' => Yii::$app->urlManager->createUrl(['/adm/default/dinamic']),
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <span>&ensp;</span>
    <div class="pull-right hidden-xs">
        <strong>Copyright &copy; 2014-<?=date('Y')?> <a href="http://luckyshop.ru">LUCKY.ONLINE</a>.</strong>
    </div>
</footer>