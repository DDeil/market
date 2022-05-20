<?php

namespace app\commands;

use app\models\User;
use yii\console\ExitCode;
use yii\console\Controller;

class SuperUserController extends Controller
{
 public function actionIndex($id = '')
 {
     $user = User::findOne(['id' => $id]);
     if (!$user){
         echo 'Нет такого пользавателя';
     }
     $user->type = User::TYPE_DIRECTOR;
     $user->save();
     echo "Тип пользователя изменен";
 }
}