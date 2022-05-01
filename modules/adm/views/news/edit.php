<?php
/**
 * @var AddCategoryForm $editForm
 */

use app\models\News;
use app\modules\adm\forms\AddCategoryForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Обновить публикацию';
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($editForm, 'title')?>
                <?= $form->field($editForm, 'description')?>
                <?= $form->field($editForm, 'status')->dropdownList(News::STATUS_LIST)?>
                <?= $form->field($editForm, 'image')->fileInput()?>
            </div>
            <div class="box-body">
                <div class=" pull-right">
                    <?= Html::submitButton('Обновить', ['class' => 'btn btn-success'])?>
                    <?= Html::a('Назад', Url::to('list'),['class' => 'btn btn-success'])?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
