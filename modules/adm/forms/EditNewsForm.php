<?php

namespace app\modules\adm\forms;

use app\models\News;
use yii\base\Model;

class EditNewsForm extends Model
{

    public $title;
    public $description;
    public $image;
    public $status;

    private $news;



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

    public function __construct(News $news)
    {
        $this->title = $news->title;
        $this->description = $news->description;
        $this->status = $news->status;


        $this->news = $news;
    }

    public function process()
    {
        $imageFileName = $this->image ? (new \DateTime())->format('Ymd_His_u') . '.' . $this->image->extension : null;

        $newsModel = $this->news;

        $newsModel->title = $this->title;
        $newsModel->description = $this->description;
        $newsModel->status = $this->status;

        if ( !empty($imageFileName) && !empty($newsModel->image)){
            $path = '@app/web/image/news/' . $newsModel->image;
            $path = \Yii::getAlias($path);
            unlink($path);
        }

        if (!empty($imageFileName)) {
            $newsModel->image = $imageFileName;
        }

        if (!$newsModel->save()) {
            return false;
        }

        if ($imageFileName) {
            $path = '@app/web/image/news/' . $imageFileName;
            $path = \Yii::getAlias($path);
            $this->image->saveAs($path);
            return true;
        }
    }
}