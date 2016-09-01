<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/8/2016
 * Time: 8:31 AM
 */

namespace humhub\modules\news\models;
use yii\base\Model;
use humhub\modules\content\components\ContentActiveRecord;

use yii\web\UploadedFile;

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

            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'created_by' => 'Created By',

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