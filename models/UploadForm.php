<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/8/2016
 * Time: 8:31 AM
 */

namespace humhub\modules\news\models;

use yii\base\Model;
use yii\web\UploadedFile;
use humhub\modules\content\components\ContentActiveRecord;

class UploadForm extends ContentActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['title', 'text', 'created_at', 'created_by'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('NewsModule.models_UploadForm', 'Title'),
            'text' => Yii::t('NewsModule.models_UploadForm', 'Text'),
            'created_at' => Yii::t('NewsModule.models_UploadForm', 'Created At'),
            'created_by' => Yii::t('NewsModule.models_UploadForm', 'Created By'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->imageFile->saveAs('/uploads/' . rand() . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
