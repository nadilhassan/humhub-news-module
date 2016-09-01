<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 11:11 AM
 */

namespace humhub\modules\news;
use humhub\modules\news\widgets\Sidebar;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;
use humhub\modules\news\models\News;
use Yii;
use yii\base\Object;

class Events extends Object
{
    public static function onWallEntryControlsInit($event)
    {
        $object = $event->sender->object;

        if (!$object instanceof News) {
            return;
        }


    }

    public static function onUserMenuInit($event){
        $user=$event->sender->user;
        // Is Module enabled on this workspace?
        if ($user->isModuleEnabled('news')) {
            $event->sender->addItem(array(
                'label' => 'News',
                'group' => 'modules',
                'url' => $user->createUrl('/news/news/show'),
                'icon' => '<i class="fa fa-comment"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'news'),
            ));
        }
    }
    public static function onSpaceMenuInit($event)
    {
        $space = $event->sender->space;

        // Is Module enabled on this workspace?
        if ($space->isModuleEnabled('news')) {
            $event->sender->addItem(array(
                'label' => 'News',
                'group' => 'modules',
                'url' => $space->createUrl('/news/news/show'),
                'icon' => '<i class="fa fa-comment"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'news'),
            ));
        }
    }
    public static function onUserDelete($event)
    {
        //here you need to write the specific codes

        return true;
    }

    public static function onSidebarInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->addWidget(Sidebar::className(), array(), array('sortOrder' => 100));
    }

}