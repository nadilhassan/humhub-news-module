<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 3:32 PM
 */

namespace humhub\modules\news\widgets;
use humhub\modules\news\models\NewsLayouts;
use humhub\modules\news\models\UsersNewsLayout;
use Yii;

class WallEntry extends \humhub\modules\content\widgets\WallEntry
{

    public $editRoute="/news/news/edit";
    public $showFiles=false;


    public function run()
    {
       


        return $this->render('wallentry', array('news' => $this->contentObject,
            'user' => $this->contentObject->content->user,
            'contentContainer' => $this->contentObject->content->container,
            
            ));
    }
}