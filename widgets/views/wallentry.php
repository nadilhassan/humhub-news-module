<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 4:22 PM
 */


?>

<?php
$itemContent = \humhub\modules\content\models\Content::findOne(['object_id' => $news->id]);
$currentlayout=\humhub\modules\news\models\NewsLayouts::findOne([
    'id'=>$news->layout_id
]);
$briefText = \yii\helpers\Markdown::process($news->text);
$stringCount=strlen($briefText);
$prntReadMore=false;
$bodyText="";
if($stringCount < 801){
    $bodyText=$briefText;
    $prntReadMore=false;
}else{
    $bodyText = substr($briefText, 0, 750);

    $prntReadMore=true;
}


if($news->imgfile == "" || $news->imgfile == null){
    //code removed
}else{
    $file = \humhub\modules\file\models\File::findOne(['guid' => $news->imgfile]);
    $fileUrl = $file->getUrl();


}

if(!(is_null($currentlayout))){
    ?>

<!--    <h1>--><?php //echo $contentContainer->content->id ?><!-- </h1>-->

    <div class="" >
        <?php


       
        if($currentlayout->name == "loud") {
            ?>
            <div class="row ">
                <div class="col-md-12 news-margin-top">
                    <h4 class="text-center"><b><?php echo Html::encode($news->title) ?></b></h4>
                </div>
            </div>
            <?php
            if($news->imgfile == "" || $news->imgfile == null){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>
                            <?php
                            echo $bodyText;
                            ?>
                            </strong>
                                <?php
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo']);
                            }
                            ?>

                        </p>
                    </div>
                </div>
                <?php
            }else{?>
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="<?php echo $fileUrl; ?>" data-toggle="lightbox" data-type="image" data-footer="<button type=&quot;button&quot; class=&quot;btn btn-primary pull-right&quot; data-dismiss=&quot;modal&quot;>Close</button>">
                            <img style="margin-right: 10px;"  ALIGN="left" class="thumbnail col-md-7" src="<?php echo $fileUrl;?>">
                        </a>
                        <p style="font-weight: 600">
                            <i>
                            <?php
                            echo $bodyText;
                            ?>
                            </i>
                            <?php
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>

                    </div>

                </div>
                <?php
            }?>

            <?php
        }else if($currentlayout->name == "quite"){?>
            <div class="row text-center ">
                <div class="col-md-12 news-margin-top">
                    <h4><?php echo Html::encode($news->title) ?></h4>
                </div>
            </div>
            <?php
            if($news->imgfile == "" || $news->imgfile == null){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);

                            }
                            ?>
                        </p>
                    </div>
                </div>
                <?php
            }else{?>
                <div class="row news-margin-top" >
                    <div class="col-md-12">
                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <a href="<?php echo $fileUrl; ?>" data-toggle="lightbox" data-type="image" data-footer="<button type=&quot;button&quot; class=&quot;btn btn-primary pull-right&quot; data-dismiss=&quot;modal&quot;>Close</button>">
                            <img class="thumbnail col-md-12" src="<?php echo  $fileUrl; ?>">
                        </a>

                    </div>
                </div>
                <?php
            }?>
            <?php

        }else if($currentlayout->name == "default") { ?>
            <div class="row ">
                <div class="col-md-12 news-margin-top">
                    <h4 class=""><?php echo Html::encode($news->title) ?></h4>
                </div>

            </div>
            <?php
            if($news->imgfile == "" || $news->imgfile == null){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <?php
            }else{?>
                <div class="row">
                    <div class="col-md-12 news-margin-top">
                        <a href="<?php  echo $fileUrl; ?>" data-toggle="lightbox" data-type="image" data-footer="<button type=&quot;button&quot; class=&quot;btn btn-primary pull-right&quot; data-dismiss=&quot;modal&quot;>Close</button>">
                            <img style="margin-right: 10px;"  ALIGN=”right” class="thumbnail col-md-7" src="<?php echo  $fileUrl; ?>">
                        </a>


                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>

                    </div>


                </div>
                <?php
            }?>
            <?php
        }else if($currentlayout->name == "loud story") { ?>
            <?php
            if($news->imgfile == "" || $news->imgfile == null){
                ?>
                <div class="row text-center ">
                    <div class="col-md-12 news-margin-top">
                        <h4><?php echo Html::encode($news->title) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <?php
            }else{?>
                <div class="row ">

                    <div class="col-md-12 news-margin-top">
                        <a href="<?php echo $fileUrl; ?>" data-toggle="lightbox" data-type="image" data-footer="<button type=&quot;button&quot; class=&quot;btn btn-primary pull-right&quot; data-dismiss=&quot;modal&quot;>Close</button>">
                            <img class="thumbnail col-md-12" src="<?php echo  $fileUrl; ?>">
                        </a>

                    </div>

                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><?php echo Html::encode($news->title) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <p>
                            <?php
                            echo $bodyText;
                            if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                                echo '<br>';
                                echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                            }
                            ?>
                        </p>

                    </div>


                </div>
                <?php
            }?>

            <?php
        }
        ?>




    </div>
    <?php
}else{
    ?>
    <div class="row ">
        <div class="col-md-12 news-margin-top">
            <h4 class=""><?php echo Html::encode($news->title) ?></h4>
        </div>

    </div>
    <?php
    if($news->imgfile == "" || $news->imgfile == null){
        ?>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php
                    echo $bodyText;
                    if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                        echo '<br>';
                        echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                    }
                    ?>
                </p>
            </div>
        </div>
        <?php
    }else{?>
        <div class="row">
        </div>
                <p>
                    <?php
                    echo $bodyText;
                    if($prntReadMore){

//                               echo '&nbsp;&nbsp;&nbsp;';
                        echo '<br>';
                        echo Html::a('<strong>Read more</strong>' . ' <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>', $news->content->getContainer()->createUrl('/news/news/view', ['id' => $news->id]), ['class' => 'colorInfo',]);
                    }
                    ?>
                </p>

            </div>


        </div>
        <?php
    }?>
    <?php
}
?>


