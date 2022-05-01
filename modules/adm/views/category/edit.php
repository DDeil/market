<?php
/**
 * @var EditCategoryForm $editForm
 */

use app\models\Category;
use app\modules\adm\forms\EditCategoryForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Обновить категории';
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($editForm, 'title')?>
                <?= $form->field($editForm, 'status')->dropdownList(Category::STATUS_LIST)?>
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
