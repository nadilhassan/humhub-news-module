<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 9:23 AM
 */

namespace humhub\modules\news;

use humhub\modules\news\models\News;
use humhub\modules\news\models\NewsLayouts;
use humhub\modules\space\models\Space;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\content\components\ContentContainerModule;
use humhub\modules\user\models\User;

class Module extends ContentContainerModule
{
    public function getContentContainerTypes()
    {
        return [
            Space::className(),
            User::className(),
        ];
    }

    public function disable()
    {
        foreach (News::find()->all() as $newsStories) {
            $newsStories->delete();
        }

        foreach (NewsLayouts::find()->all() as $layout){
            $layout->delete();
        }

        parent::disable();
    }

    public function disableContentContainer(ContentContainerActiveRecord $container)
    {
        parent::disableContentContainer($container);

    }
    public function getPermissions($contentContainer = null)
    {
        if ($contentContainer instanceof \humhub\modules\space\models\Space) {
            return [
                new permissions\CreateNews()
            ];
        }

        return [];
    }

}
