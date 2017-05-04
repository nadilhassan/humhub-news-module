<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/1/2016
 * Time: 5:00 PM
 */

namespace humhub\modules\news\models;

use yii\base\Model;

class EditForm extends Model
{
    public $title;
    public  $text;
    public $createdat;
    public $createdby;

    public function rules()
    {
        return array(
            array(['title', 'text',], 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => Yii::t('NewsModule.models_EditForm', 'Title'),
            'text' => Yii::t('NewsModule.models_EditForm', 'Story'),
        );
    }

}
