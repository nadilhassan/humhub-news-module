<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 9:21 AM
 */

use humhub\modules\space\widgets\Menu;
use humhub\modules\user\models\User;
use humhub\commands\IntegrityController;
use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id'=>'news',
    'class' => 'humhub\modules\news\Module',
    'namespace' => 'humhub\modules\news',
    'events'=>array(
        ['class' => humhub\modules\content\widgets\WallEntryControls::className(), 'event' => humhub\modules\content\widgets\WallEntryControls::EVENT_INIT, 'callback' => ['humhub\modules\news\Events', 'onWallEntryControlsInit']],
        array('class' => User::className(), 'event' => User::EVENT_BEFORE_DELETE, 'callback' => array('humhub\modules\news\Events', 'onUserDelete')),
        array('class' => Menu::className(), 'event' => Menu::EVENT_INIT, 'callback' => array('humhub\modules\news\Events', 'onSpaceMenuInit')),
        array('class' => IntegrityController::className(), 'event' => IntegrityController::EVENT_ON_RUN, 'callback' => array('humhub\modules\news\Events', 'onIntegrityCheck')),
        array('class' => Sidebar::className(), 'event' => Sidebar::EVENT_INIT, 'callback' => array('humhub\modules\news\Events', 'onSidebarInit')),

    ),
    
    
];
