<?php

/**
 *
 * @var LinksForm               $model
 * @var ActiveDataProvider      $dataProvider
 * @var LinksSearch             $searchModel
 *
 */

use app\form\LinksForm;
use app\search\LinksSearch;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$this->title = 'Links';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-12">
              df
            </div>
            <div class="col-lg-6">
               a
            </div>
            <div class="col-lg-6">
              g
            </div>
            <div class="jumbotron">
                <?= Html::submitButton('Создать', ['class' => 'btn-lg btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

        <div class="row">
         gf
        </div>
    </div>
</div>
