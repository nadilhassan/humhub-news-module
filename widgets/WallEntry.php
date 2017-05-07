<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 3:32 PM
 */

namespace humhub\modules\news\widgets;

use Yii;
use humhub\modules\news\models\NewsLayouts;
use humhub\modules\news\models\UsersNewsLayout;

class WallEntry extends \humhub\modules\content\widgets\WallEntry
{
    public $news;
    public $editRoute = '/news/news/edit';
    public $showFiles = false;

    public function run()
    {
        $user = $this->contentObject->content->user;

        $currentUserAssigned = false;

        // Check if current user is assigned to this article
        foreach ($this->contentObject->assignedUsers as $au) {
            if ($au->id == Yii::$app->user->id) {
                $currentUserAssigned = true;
                break;
            }
        }
        return $this->render('entry', array(
                    'task' => $this->contentObject,
                    'user' => $user,
                    'contentContainer' => $this->contentObject->content->container,
                    'assignedUsers' => $this->contentObject->assignedUsers,
                    'currentUserAssigned' => $currentUserAssigned
        ));
    }
}
