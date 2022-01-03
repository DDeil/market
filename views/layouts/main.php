<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js">

        /***********************************************
         * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
         * This notice MUST stay intact for legal use
         * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
         ***********************************************/

    </script>

    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
    <script language="javascript" type="text/javascript">
        window.addEvents({
            'domready': function(){
                /* thumbnails example , div containers */
                new SlideItMoo({
                    overallContainer: 'SlideItMoo_outer',
                    elementScrolled: 'SlideItMoo_inner',
                    thumbsContainer: 'SlideItMoo_items',
                    itemsVisible: 5,
                    elemsSlide: 2,
                    duration: 200,
                    itemsSelector: '.SlideItMoo_element',
                    itemWidth: 171,
                    showControls:1});
            },

        });

        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>

</head>

<body id="home">

<?php $this->beginBody() ?>

<div id="templatemo_wrapper">
    <div id="templatemo_header">
        <div id="site_title">
            <h1><a href="#">Home Store</a></h1>
        </div>

        <div id="header_right">
            <ul id="language">
                <li><a><img src="images/usa.png" alt="English" /></a></li>
                <li><a><img src="images/china.png" alt="Chinese" /></a></li>
            </ul>
            <div class="cleaner"></div>
            <div id="templatemo_search">
                <form action="#" method="get">
                    <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
        </div> <!-- END -->
    </div> <!-- END of header -->

    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/product">Products</a>
                <ul>
                    <li><a href="#">Sub menu 1</a></li>
                    <li><a href="#">Sub menu 2</a></li>
                    <li><a href="#">Sub menu 3</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <br style="clear: left" />
    </div>

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">

        <?= $content ?>

    </div> <!-- END of main -->

    <div id="templatemo_footer">
        <div class="col col_16">
            <h4>Categories</h4>
            <ul class="footer_menu">
                <li><a href="#">Aenean et dolor diam</a></li>
                <li><a href="#">Aenean pulvinar</a></li>
                <li><a href="#">Cras bibendum auctor</a></li>
                <li><a href="#">Donec sodales bibendum</a></li>
            </ul>
        </div>
        <div class="col col_16">
            <h4>Pages</h4>
            <ul class="footer_menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
        <div class="col col_16">
            <h4>Partners</h4>
            <ul class="footer_menu">
                <li><a href="#">Website Templates</a></li>
                <li><a href="#">HTML CSS Layouts</a></li>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Free Graphics</a></li>
            </ul>
        </div>
        <div class="col col_16">
            <h4>Social</h4>
            <ul class="footer_menu">
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">LinkedIn</a></li>
            </ul>
        </div>
        <div class="col col_13 no_margin_right">
            <h4>About Us</h4>
            <p>Test</p>
        </div>

        <div class="cleaner h40"></div>
        <center>
            Copyright © <?= date('Y') ?>
        </center>

    </div> <!-- END of footer -->

</div>

<?php $this->endBody() ?>
</body>
</html>