<?php

humhub\modules\news\Assets::register($this);
use humhub\compat\CActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$bundle = \humhub\modules\news\Assets::register($this);





?>
<div class="panel">
   <div class="row" style="padding: 15px;">
       <p class="col-md-8">Would you like to create News?</p>
       <button style="margin-right: 10px;" class="btn btn-primary col-md-3  pull-right" type="button" data-toggle="collapse" data-target="#collapseNewsForm" aria-expanded="false" aria-controls="collapseNewsForm">
           <i class="glyphicon glyphicon-plus"></i>&nbsp;Add News
       </button>
   </div>
    <div class="collapse" id="collapseNewsForm">
        <div class="well">
            <?php echo \humhub\modules\news\widgets\WallCreateForm::widget(array('contentContainer' => $contentContainer));


            ?>
        </div>
    </div>
</div>









<?php
echo \humhub\modules\content\widgets\Stream::widget(array(
    'contentContainer' => $contentContainer,
    'streamAction' => '//news/news/stream',
    'messageStreamEmpty' => (true) ?
        '<b>There are no stories yet!</b><br>Be the first and create one...' :
        '<b>There are no stories yet!</b>',
    'messageStreamEmptyCss' => (true) ?
        'placeholder-empty-stream' :
        '',
));


?>

