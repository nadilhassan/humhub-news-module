<?php

namespace humhub\modules\news\models;


use humhub\modules\content\components\ContentActiveRecord;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $idnews
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property integer $created_by
 */

class News extends ContentActiveRecord
{
    /**
     * @inheritdoc
     */

    public $autoAddToWall = true;
    public $wallEntryClass = 'humhub\modules\news\widgets\WallEntry';
    public $imageFile;


    public static function tableName()
    {
        return 'news_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'created_at', 'created_by'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['created_by','layout_id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'layout_id'=>'Layout ID',
            'news'=>'News',
        ];
    }
    public function getContentName()
    {
        return "NEWS STORY";
    }

    /*public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }*/

}
