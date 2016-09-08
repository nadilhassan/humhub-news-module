<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/15/2016
 * Time: 9:43 AM
 */


use yii\helpers\Html;
use humhub\modules\space\models\Space;
use humhub\modules\content\components\ContentContainerController;

$user = $news->content->user;
$container = $news->content->container;
?>

<div class="panel" style="padding: 10px">

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center"><strong><?php echo Html::encode($news->title) ?></strong></h4>
        </div>

    </div>
    <br>
    <?php
if ($news->imgfile == "" || $news->imgfile == null) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php echo \yii\helpers\Markdown::process($news->text); ?>
                </p>
            </div>
        </div>
        <?php
    } else {
        $file = \humhub\modules\file\models\File::findOne(['guid' => $news->imgfile]);
        $fileUrl = $file->getUrl();
        ?>
        <div class="row">
            <div class="col-md-12">

                <a href="<?php echo $fileUrl; ?>" data-toggle="lightbox"
                   data-type="image"
                   data-footer="<button type=&quot;button&quot; class=&quot;btn btn-primary pull-right&quot; data-dismiss=&quot;modal&quot;>Close</button>">
                    <img style="margin-right: 10px;" ALIGN="left" class="thumbnail col-md-7"
                         src="<?php echo $fileUrl; ?>">
                </a>
                <p>
                    <?php
                    echo \yii\helpers\Markdown::processParagraph($news->text);

                    ?>
                </p>

            </div>

        </div>
        <?php
    } ?>
    <small class="pull-right">
        <?php echo \humhub\widgets\TimeAgo::widget(['timestamp' => $news->content->created_at]); ?>

        <?php if ($news->content->created_at !== $news->content->updated_at && $news->content->updated_at != ''): ?>
            (<?php echo Yii::t('ContentModule.views_wallLayout', 'Updated :timeago', array(':timeago' => \humhub\widgets\TimeAgo::widget(['timestamp' => $news->content->updated_at]))); ?>)
        <?php endif; ?>
    </small>
    <?php echo \humhub\modules\content\widgets\WallEntryAddons::widget(['object' => $news]); ?>

    <div class="row">
        <hr>
        <div class="col-md-12" style="text-align: right">
            <p><strong>Author</strong></p>

            <h4><a
                    href="<?php echo $user->getUrl(); ?>"><?php echo Html::encode($user->displayName); ?></a></h4>
            <h5><?php echo Html::encode($user->profile->title); ?></h5>
            <a href="<?php echo $user->getUrl(); ?>" class="pull-right">
                <img class="media-object img-rounded user-image user-<?php echo $user->guid; ?>" alt="40x40"
                     data-src="holder.js/40x40" style="width: 140px; height: 140px;"
                     src="<?php echo $user->getProfileImage()->getUrl(); ?>"
                     width="40" height="40"/>
            </a>
            <div class="media-body">


                <!-- show username with link and creation time-->
                <h4 class="media-heading">

                    <small>


                        <!-- show space name -->
                        <?php if (!Yii::$app->controller instanceof ContentContainerController && $container instanceof Space): ?>
                            <?php echo 'in' ?> <strong><a
                                    href="<?php echo $container->getUrl(); ?>"><?php echo Html::encode($container->name); ?></a></strong>&nbsp;
                        <?php endif; ?>

                        <?php echo \humhub\modules\content\widgets\WallEntryLabels::widget(['object' => $news]); ?>

                    </small>
                </h4>




            </div>
        </div>
    </div>
</div>




