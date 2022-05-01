
<?php
/**
 * @var \app\controllers\UserController $editForm
 *  @var User $model
 */
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Редактирование';

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($editForm, 'email')?>
                <?= $form->field($editForm, 'name')?>
                <?= $form->field($editForm, 'last_name')?>
                <?= $form->field($editForm, 'phone')?>
                <?= $form->field($editForm, 'address')?>
            </div>
            <div class="box-body">
                <div class=" pull-right">
                    <?= Html::submitButton('Изменить',['class' => 'btn btn-success'])?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

