<?php

namespace app\modules\adm\forms;

use app\models\Category;
use yii\base\Model;

class EditCategoryForm extends Model
{

    public $title;
    public $status;

    private $category;

    public function __construct(Category $category)
    {
        $this->title = $category->name;
        $this->status = $category->status;

        $this->category = $category;
    }

    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            ['title', 'string'],
            ['status', 'integer'],
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
        $model = $this->category;

        $model->name = $this->title;
        $model->status = $this->status;

        return $model->save();
    }
}