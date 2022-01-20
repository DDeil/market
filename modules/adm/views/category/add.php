<?php
/**
 * @var AddCategoryForm $addForm
 */

use app\models\Category;
use app\modules\adm\forms\AddCategoryForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Создание категории';
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($addForm, 'title')?>
                <?= $form->field($addForm, 'status')->dropdownList(Category::STATUS_LIST)?>
            </div>
            <div class="box-body">
                <div class=" pull-right">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
                    <?= Html::a('Назад', Url::to('list'),['class' => 'btn btn-success'])?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
