<?php

namespace humhub\modules\news\models;

use yii\helpers\Html;
use yii\base\Model;

class EditForm extends Model
{

    public $title;
    public $text;
    public $createdat;
    public $createdby;
    public $guids = [];
    
    public function rules()
    {
            return [
            [['title', 'text',], 'required', 'guids', 'safe'],
        ];
    }
    
    public function getSelectionString() {
        if(empty($this->guids)) {
            return 'Empty selection!';
        } else {
            return Html::encode(implode(', ', $this->guids));
        }
    }

    public function attributeLabels()
    {
        return array(
            'title' =>'Title',
            'text' => 'Story',
        );
    }
}
