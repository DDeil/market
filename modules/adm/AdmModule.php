<?php

namespace app\modules\adm;

use app\models\User;
use yii\base\Module;
use yii\web\ForbiddenHttpException;

class AdmModule extends Module
{
    public $controllerNamespace = 'app\modules\adm\controllers';

    public $layout = '@app/modules/adm/views/layouts/main';

    public function beforeAction($action)
    {
        /** @var User $user */
        $user = \Yii::$app->getUser()->identity ?? null;
        if (!$user || !($user->type == User::TYPE_DIRECTOR || $user->type == User::TYPE_ADM)) {
            throw new ForbiddenHttpException();
        }

        return parent::beforeAction($action);
    }
}