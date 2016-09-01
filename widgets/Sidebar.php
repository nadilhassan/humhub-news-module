<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/14/2016
 * Time: 11:18 AM
 */

namespace humhub\modules\news\widgets;


use humhub\components\Widget;
use humhub\modules\news\models\News;
use Yii;

class Sidebar extends Widget
{
    public function run()
    {

        $hasModule=\Yii::$app->hasModule('news');
        if($hasModule){
            $news=News::find()->orderBy('created_at DESC')->orderBy('id DESC')->limit(5)->all();
            if (count($news) == 0) {
                return;
            }

            return $this->render('sidebar', array(
                'news' => $news
            ));
        }

    }

}