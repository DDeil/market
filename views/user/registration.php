
<?php
/**
* @var \app\controllers\UserController $registrationForm
*  @var User $model
*/
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Регистрация';

 $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($registrationForm, 'name')?>
                    <?= $form->field($registrationForm, 'last_name')?>
                    <?= $form->field($registrationForm, 'email')?>
                    <?= $form->field($registrationForm, 'password')?>
                    <?= $form->field($registrationForm, 'phone')?>
                    <?= $form->field($registrationForm, 'address')?>
                </div>
                <div class="box-body">
                    <div class=" pull-right">
                        <?= Html::submitButton('Регистрация',['class' => 'btn btn-success'])?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>

