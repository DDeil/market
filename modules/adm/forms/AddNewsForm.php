<?php

namespace app\modules\adm\forms;

use app\models\News;
use yii\base\Model;

class AddNewsForm extends Model
{

    public $title;
    public $description;
    public $image;
    public $status;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['title', 'description'], 'string'],
            [['status'], 'integer'],
        ];
    }

    public function process()
    {
        $imageFileName = $this->image ? (new \DateTime())->format('Ymd_His_u') . '.' . $this->image->extension : null;

        $newsModel = new News();

        $newsModel->title       = $this->title;
        $newsModel->description = $this->description;
        $newsModel->status      = $this->status;
        $newsModel->image       = $imageFileName;

        if (!$newsModel->save()) {
            return false;
        }

        if ($imageFileName) {
            $path = '@app/web/image/news/' . $imageFileName;
            $path = \Yii::getAlias($path);

            $this->image->saveAs($path);
        }
        return true;
    }
}