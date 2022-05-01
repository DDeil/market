<?php
/**
 * @var UserController $loginForm
 * @var
 */

use app\controllers\UserController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход';
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-3">
        <?= $form->field($loginForm, 'email')->hint('Введите Email') ?>
        <?= $form->field($loginForm, 'password')->passwordInput()->hint('Введите пароль') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Регистрация',Url::to(['registration']), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>
<?php
if (\Yii::$app->user->isGuest){
echo ' ne avto';
}else{
echo '  avto';
}
