<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 11:57 AM
 */

namespace humhub\modules\news\components;

use humhub\modules\news\models\News;
use Yii;
use humhub\modules\content\components\actions\ContentContainerStream;

class StreamAction extends ContentContainerStream
{

    public function setupFilters()
    {
        $this->activeQuery->andWhere(['content.object_model' => News::className()]);


    }
}