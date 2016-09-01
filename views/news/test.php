<?php
use yii\helpers\Html;
use yii\helpers\Url;
use humhub\modules\user\models\User;
use humhub\modules\space\models\Space;

$userId = Yii::$app->user->id;;
$user = \humhub\modules\user\models\User::findOne($userId);
$isProfileOwner=true;
?>

<div class="panel panel-default panel-profile">

    <div class="panel-profile-header">
        <form class="fileupload" id="justupload" action="<?= $cont->createUrl('/news/news/testupload') ?>" method="POST" enctype="multipart/form-data"
             >
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="file" name="bannerfilestwo[]">
            <button type="submit">Done</button>
        </form>




    </div>

 </div>