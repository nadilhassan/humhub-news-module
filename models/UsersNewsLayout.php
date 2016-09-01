<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/9/2016
 * Time: 11:19 AM
 */

namespace humhub\modules\news\models;

use humhub\modules\content\components\ContentActiveRecord;
use Yii;
use yii\db\ActiveRecord;

class UsersNewsLayout extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_news_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'layoutid', 'changed_at'], 'required'],
            [['userid', 'layoutid'], 'integer'],
            [['changed_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'layoutid' => 'Layoutid',
            'changed_at' => 'Changed At',
        ];
    }

}