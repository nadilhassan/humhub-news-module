<?php


namespace humhub\modules\news\widgets;


use humhub\components\Widget;
use humhub\modules\news\models\News;
use humhub\modules\content\components\ActiveQueryContent;
use Yii;

class Sidebar extends Widget
{
    public function run()
    {

        $hasModule=\Yii::$app->hasModule('news');
        if($hasModule){
            $news = News::find()->userRelated([
                ActiveQueryContent::USER_RELATED_SCOPE_SPACES,
                ActiveQueryContent::USER_RELATED_SCOPE_FOLLOWED_SPACES])->limit(5)->all();
            if (count($news) == 0) {
                return;
            }

            return $this->render('sidebar', array(
                'news' => $news
            ));
        }

    }

}
