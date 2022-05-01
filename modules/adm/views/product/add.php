<?php
/**
 * @var AddProductForm  $addForm
 */

use app\models\Category;
use app\models\Product;
use app\modules\adm\forms\AddProductForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Добавть товар';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <?= $form->field($addForm, 'title')?>
                <?= $form->field($addForm, 'description')?>
                <?= $form->field($addForm, 'status')->dropdownList(Product::STATUS_LIST)?>
                <?= $form->field($addForm, 'type')->dropdownList(Product::TYPE_LIST)?>
                <?= $form->field($addForm, 'categoryIds')->widget(Select2::class, [
                            'data'          => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options'       => [
                                'placeholder' => 'Категория',
                                'multiple'    => true,
                            ],

                        ])?>
                <?= $form->field($addForm, 'price')?>
                <?= $form->field($addForm, 'is_hit')->checkbox()?>
                <?= $form->field($addForm, 'is_new')->checkbox()?>
                <?= $form->field($addForm, 'image')->fileInput()?>
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
