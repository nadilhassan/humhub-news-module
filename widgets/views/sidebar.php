<?php

use yii\helpers\Html;
use yii\helpers\Url;
use humhub\libs\Helpers;
use humhub\widgets\MarkdownView;

humhub\modules\news\Assets::register($this);

?>
<div class="panel panel-default" id="news-panel">

    <!-- Display panel menu widget -->
    <?php humhub\widgets\PanelMenu::widget(array('id' => 'news-panel')); ?>

    <div class="panel-heading  bg-primary">
        <strong><?php echo Yii::t('NewsModule.widgets_views_sidebar', 'Latest News'); ?></strong>
    </div>
    <div class="panel-body">
        <?php foreach ($news as $n):
            if($n->imgfile == "" || $n->imgfile == null){
                //code removed
            }else{
                $file = \humhub\modules\file\models\File::findOne(['guid' => $n->imgfile]);
                $fileUrl = $file->getUrl();

            }

            ?>
            <div class="media news-entry">
                <div class="media-body">

                    <h4><a href="<?php echo $n->content->getContainer()->createUrl('/news/news/view',['id'=>$n->id]) ?>">
                            <strong><?php echo Html::encode($n->title); ?></strong>
                        </a>

                    </h4>

                        <div class="row">
                            <?php
                            if ($n->imgfile != null || $n->imgfile != "") {
                                ?>

                                    <img style="" src="<?php echo  $fileUrl; ?>" class="thumbnail col-md-12">

                                <?php
                            }
                            ?>


                        </div>










                    <p>
                        <?php
                        $briefText = \yii\helpers\Markdown::processParagraph($n->text);
                        $brief = substr($briefText, 0, 200);
                        echo $brief; ?>
                    </p>
                    <small>
                        <span class="time pull-right" title="<?php echo $n->created_at; ?>"></span>
                    </small>
                    <br>
                    <?php echo Html::a('Read more' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $n->content->getContainer()->createUrl('/news/news/view',['id'=>$n->id]), ['class' => 'colorInfo']); ?>


                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

