<?php
/**
 * @var  AddUserForm  $addForm
 *  @var User $model
 */


use app\models\User;
use app\modules\adm\forms\AddUserForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Добавть пользователя';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($addForm, 'name')?>
                    <?= $form->field($addForm, 'last_name')?>
                    <?= $form->field($addForm, 'email')?>
                    <?= $form->field($addForm, 'password')?>
                    <?= $form->field($addForm, 'phone')?>
                </div>
                <div class="box-body">
                    <div class=" pull-right">
                        <?= Html::submitButton('Добавить',['class' => 'btn btn-success'])?>

                        <?= Html::a('Назад', Url::to('list'),['class' => 'btn btn-success'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>