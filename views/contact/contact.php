<?php

$this->title = 'Контакты';
?>
<div class="row">
    <div class="col-sm-12">
        <h2>Контакты</h2>
        <hr>
    </div>

    <div class="col-sm-6">
        <div>
        <h3>Телефоны</h3>
        <?php $users = \app\models\User::findAll(['type' => \app\models\User::TYPE_ADM]);
        foreach ($users as $user){?>
            <p><?=$user->name." : ".$user->phone;?></p>
        <?php };?>
        </div>
    </div>
    <div class="col-sm-6">
        <h3>График работы</h3>
        <p>Понедельник: c 9 - 18</p>
        <p>Вторник: c 9 - 18</p>
        <p>Среда: c 9 - 18</p>
        <p>Четверг: c 9 - 18</p>
        <p>Пятничца: c 9 - 18</p>
        <p>Суббота: Выходной</p>
        <p>Воскресенье: Выходной</p>
    </div>

</div>

<hr>

<div class="col-sm-12">
    <div class="col-sm-4">
    <h3>Адрес</h3>
    <p>Город: Нора-Ебаная</p>
    <p>Улица: Хомяка 136Б</p>
    </div>
    <div class="col-sm-8">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d169325.0397027911!2d34.860271657646784!3d48.46221349971661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe303fd08468f%3A0xa1cf3d5f2c11aba!2z0JTQvdC10L_RgCwg0JTQvdC10L_RgNC-0L_QtdGC0YDQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsINCj0LrRgNCw0LjQvdCwLCA0OTAwMA!5e0!3m2!1sru!2snl!4v1653303197187!5m2!1sru!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
