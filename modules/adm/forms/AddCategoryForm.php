<?php

namespace app\modules\adm\forms;

use app\models\Category;
use yii\base\Model;

class AddCategoryForm extends Model
{

    public $id;
    public $title;
    public $status;

    public function rules()
    {
        return [
            ['title', 'string'],
            [['id','status', ],'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'  => 'Название',
            'status' => 'Статус',
        ];
    }

    /**
     * @return bool
     */
    public function process(): bool
    {

        $model = new Category();


        $model->name = $this->title;
        $model->status = $this->status;

        return $model->save();
    }
}