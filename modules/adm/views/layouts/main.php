<?php

use app\models\Ticket;
use app\models\UserOfferAccess;
use yii\helpers\Html;
use yii\web\AssetBundle;

/* @var $this \yii\web\View */
/* @var $content string */

//app\modules\adm\assets\AdminAsset::register($this);
AssetBundle::register($this);
dmstr\web\AdminLteAsset::register($this);

//$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
//
//$tiketCount = Ticket::find()->andWhere(['status' => true])->count();
//$requestCount = UserOfferAccess::find()->andWhere(['status' => UserOfferAccess::STATUS_NEW])->count();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon/favicon_redesign.ico">
    <link rel="manifest" href="//lucky.online/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="//lucky.online/favicon/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    .no-animate {
        transition: none!important;
    }
</style>
<body class="hold-transition skin-black sidebar-mini <?= Yii::$app->session->get('sidebarState') == 1 ? 'sidebar-collapse' : '';?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?= $this->render('header.php') ?>
    <?= $this->render('left.php') ?>
    <?= $this->render('content.php', ['content' => $content]) ?>
</div>
<?php $this->endBody() ?>
<!--TODO: Вынести скрипты -->
<script>
    $(document).ready(function () {

        var docBody = document.querySelector('body');
        var sidebar = document.querySelector('.main-sidebar')
        var sidebarToggler = document.querySelector('.sidebar-toggle')

        function handleMenuCollapse() {
            //сначала работает этот обработчик, потом какая-то либа из вендора вешает класс,
            // поэтому тут проверка от обратного - если на момент пуска класса нет, то вешаем статус закрытого,
            // т.к. на конец работы всех обработчиков меню будет закрыто
            if (!docBody.classList.contains('sidebar-collapse')) {
                localStorage.setItem('adminSidebar', 'collapsed')
            } else {
                localStorage.setItem('adminSidebar', 'unfolded')
            }
        }

        function detectLeftMenuState() {
            if (!localStorage.getItem('adminSidebar')) {
                if (docBody.classList.contains('sidebar-collapse')) {
                    localStorage.setItem('adminSidebar', 'collapsed')
                } else {
                    localStorage.setItem('adminSidebar', 'unfolded')
                }
            } else {
                localStorage.getItem('adminSidebar') === 'collapsed' ? docBody.classList.add('sidebar-collapse') : void 0
            }
            sidebar.classList.remove('no-animate')
        }

        detectLeftMenuState()

        sidebarToggler.addEventListener('click', handleMenuCollapse)


        $(document).on('click', '.delete-price', function (e) {
            e.preventDefault();

            var id = $(this).data('id');

            var form = $(this).closest('form');

            $.get('/adm/postlands/price-delete.html?id='+id, function (data) {
                form.remove();
            });

        });

        $(document).on('click', '.add-price', function (e) {
            e.preventDefault();

            var id = $(this).data('id');

            $.get('/adm/postlands/price-form.html?id='+id, function (data) {
                $('.prices').append(data);
            });

        });

        $(document).on('click', '.save-all-price', function () {
            $('.prices form button[type=submit]').click();
        });




        $(document).on('submit', '.prices form' ,function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var form = $(this).closest('form');
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url:form.attr('action'),
                data: data,
                success: function (data) {
                    form.replaceWith(data);
                }
            });
        });



    });
</script>
</body>
</html>
<?php $this->endPage() ?>
