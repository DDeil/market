<?php

/**
 *
 * @var Product      $product
 *
 */

use app\models\Category;
use app\models\Product;
use app\models\search\ProductSearch;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Promotion;

$this->title = 'Главная';
?>

    <div class="col-lg-offset-2 col-sm-12 ">
        <div class="row">
            <h2><?= $product->title ?></h2>

            <hr>
        </div>
        <div class="row">
                <div class="col-sm-4 col-lg-4">
                    <div style="text-align:center; margin-bottom: 10px; padding-bottom: 10px; width: 100%; height: 250px" class="btn-default" >

                        <?= Html::img("@web/image/product/$product->image",['height' => 150])?>
                      </div>
                </div>
                    <div style="border-color: #0a568c">
                        <p class="bg-light-blue"><h4>Цена: $  <?= $product->price ?></p></h4>
                        <?php foreach ($product->promo as $promo){?>
                            <p>Акционный продукт: - <?=$promo->rate?> %</p>
                        <?php }?>
                        <p class="bg-light-blue"><h5>Код продукта :  <?= $product->id ?></p></h5>

                        <form action="" method="post">
                            <h4>Количество :</h4>
                            <input type="number" min="1" value="1" id="qty">
                            <a href="<?=Url::to(['cart/add', 'id'=>$product->id,])?>" data-id="<?=$product->id?>" class="btn btn-sm btn-warning add-to-cart"><?= Html::img("@web/image/cart.png",['height' => 15])?>В корзину</a>
                        </form>




                    </div>

        </div>
        <div class="row">
            <hr>
            <p><?= $product->description ?></p>
        </div>
    </div>







