<?php

namespace app\modules\adm;

use yii\base\Module;

class AdmModule extends Module
{
    public $controllerNamespace = 'app\modules\adm\controllers';

    public $layout = '@app/modules/adm/views/layouts/main';
}