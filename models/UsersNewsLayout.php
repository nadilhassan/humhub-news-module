<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/9/2016
 * Time: 11:19 AM
 */

namespace humhub\modules\news\models;

use Yii;
use humhub\modules\content\components\ContentActiveRecord;

class UsersNewsLayout extends yii\db\ActiveRecord
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
            'id' => Yii::t('NewsModule.models_UsersNewsLayout', 'ID'),
            'userid' => Yii::t('NewsModule.models_UsersNewsLayout', 'Userid'),
            'layoutid' => Yii::t('NewsModule.models_UsersNewsLayout', 'Layoutid'),
            'changed_at' => Yii::t('NewsModule.models_UsersNewsLayout', 'Changed At'),
        ];
    }
}
