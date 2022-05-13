
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

    <div class="row" >
        <div class="col-lg-offset-4 col-lg-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($registrationForm, 'name')->hint('Введите Имя') ?>
                    <?= $form->field($registrationForm, 'last_name')->hint('Введите Фамилию') ?>
                    <?= $form->field($registrationForm, 'email')->hint('Введите Email') ?>
                    <?= $form->field($registrationForm, 'password')->hint('Введите Пароль') ?>
                    <?= $form->field($registrationForm, 'phone')->hint('Введите номер телефона') ?>
                    <?= $form->field($registrationForm, 'address')->hint('Введите Адрес') ?>
                </div>
                <div class="box-body">a
                    <div class=" pull-right">
                        <?= Html::submitButton('Регистрация',['class' => 'btn btn-success'])?>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

