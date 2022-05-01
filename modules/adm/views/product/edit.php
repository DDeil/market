<?php
/**
 * @var EditProductForm  $editForm
 */

use app\models\Category;
use app\models\Product;
use app\modules\adm\forms\EditProductForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Обновить товар';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($editForm, 'title')?>
                <?= $form->field($editForm, 'description')?>
                <?= $form->field($editForm, 'status')->dropdownList(Product::STATUS_LIST)?>
                <?= $form->field($editForm, 'type')->dropdownList(Product::TYPE_LIST)?>
                <?= $form->field($editForm, 'categoryIds')->widget(Select2::class, [
                    'data'          => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'options'       => [
                        'placeholder' => 'Категория',
                        'multiple'    => true,
                    ],

                ])?>
                <?= $form->field($editForm, 'price')?>
                <?= $form->field($editForm, 'is_hit')->checkbox()?>
                <?= $form->field($editForm, 'is_new')->checkbox()?>
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
