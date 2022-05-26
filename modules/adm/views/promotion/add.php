<?php
/**
 * @var  AddPromotionForm  $addForm
 *  @var Promotion $model
 */


use app\models\Promotion;
use app\modules\adm\forms\AddPromotionForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Category;
use kartik\select2\Select2;

$this->title = 'Добавть акционый товар';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($addForm, 'product_id')->widget(Select2::class, [
                        'data'          => \app\models\Product::find()->select(['title', 'id'])->indexBy('id')->column(),
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                        'options'       => [
                            'placeholder' => 'Выберите продукт',
                            'multiple'    => true,
                        ],

                    ])?>
                    <?= $form->field($addForm, 'rate')->input('number',['min'=>0 , 'max'=>100])?>
                    <?= $form->field($addForm, 'date_from')->input('date')?>
                    <?= $form->field($addForm, 'date_to')->input('date')?>
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