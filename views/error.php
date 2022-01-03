<?php

/**
 * @var $name string
 */

use yii\helpers\Html;
?>
<div class="error">

    <div class="error__img dec">
        <img src="/error/images/Gifka.png" alt="" />
    </div>

    <div class="error__desc">

        <div class="error__content">
            <div class="error__404">
                <p><?= Html::encode($name) ?></p>
            </div>
        </div>
        <div class="error__bottom">

            <p>К сожалению, страница, которую вы ищете, устарела, была удалена или не существовала вовсе.</p>

            <a class="btnflip" href="/">
                <span class="btnflip-item btnflip__front">Перейти на главную</span>
                <span class="btnflip-item btnflip__center"></span>
            </a>

        </div>

    </div>

</div>

<div class='bottom'></div>