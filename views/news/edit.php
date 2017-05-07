<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/6/2016
 * Time: 11:19 AM
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

humhub\modules\news\Assets::register($this);

$layoutCollapseClassName = "collapseEditNewsLay" . $news->id;
$authorCollapseClassName = "collapseEditAuthor" . $news->id;
$authorInputId="news_input_author".$news->id;
?>

<div class="content_edit" id="poll_edit_<?= $news->id; ?>">
    <p class="errorMessage" style="color:#ff8989;display:none"></p>
    <?php
    $form = ActiveForm::begin(['id' => 'news-edit-form_' . $news->id]);
    echo Html::hiddenInput('editguid', '', ['id' => 'editguid']);
    echo $form->label($news, "title", ['class' => 'control-label']);
    ?>
    <div class="form-group">
        <?= $form->textField($news, 'title', array('class' => 'form-control', 'id' => 'news_input_title_' . $news->id, 'placeholder' => 'Edit your news title...')); ?>

    </div>

    <div class="form-group">
        <?php
        echo $form->label($news, 'Body', ['class' => 'control-label'])
        ?>

        <!--    --><?php //echo \yii\helpers\Html::textArea("text",$news->text, ); ?>
        <?= $form->textArea($news, 'text', array('id' => 'news_input_text_' . $news->id, 'class' => 'form-control autosize contentForm', 'rows' => '14', "tabindex" => "1", 'placeholder' => 'Write something...')) ?>
        <?= \humhub\widgets\MarkdownEditor::widget(array('fieldId' => 'news_input_text_' . $news->id)); ?>
    </div>

    <div class="form-group">
        <a class="colorSecondary" role="button" data-toggle="collapse" href=".<?= $authorCollapseClassName; ?>"
           aria-expanded="false"
           aria-controls="collapseExample">
            Edit Author
        </a>
    </div>

        <div class="collapse <?= $authorCollapseClassName; ?>" id="">
            <div class="">
                <?= Html::textInput($authorInputId, '', array('id' => $authorInputId, 'placeholder' => '')); ?>

                <?=
                   \humhub\modules\user\widgets\UserPicker::widget(array(
                    'inputId' => $authorInputId,
                    'userSearchUrl' => $container->createUrl('/space/membership/search', array('keyword' => '-keywordPlaceholder-')),
                    'maxUsers' => 10,
                    'placeholderText' => 'Assign An Author',
                    'class' => 'dd'
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">

        <a class="colorSecondary" role="button" data-toggle="collapse" href=".<?= $layoutCollapseClassName; ?>"
           aria-expanded="false"
           aria-controls="collapseExample">
            Edit Layout
        </a>

        <div class="collapse <?= $layoutCollapseClassName; ?>" style="margin-top: 15px;">
            <div class="">
                <?php
                foreach ($layouts as $lay):
                    $appendChecked = '';
                    if ($lay->id == $news->layout_id) {
                        $appendChecked = 'checked';
                    } else {
                        $appendChecked = '';
                    }
                    ?>
                    <label class="change_layout">
                        <p class="text-center"><?= strtoupper($lay->name) ?></p>
                        <input <?= $appendChecked ?> id="news_input_layout<?= $lay->id; ?>" type="radio"
                                                     name="news_input_layout"
                                                     value="<?= $lay->id; ?>"/>

                        <?php
                        if ($lay->name == "loud") {
                            $fileUrl = Yii::$app->getModule('news')->getAssetsUrl() . '/layout_4.jpg';
                            echo '<img style="width: 100px;" src="' . $fileUrl . '">';
                        } else if ($lay->name == "quite") {
                            $fileUrl = Yii::$app->getModule('news')->getAssetsUrl() . '/layout_2.jpg';
                            echo '<img style="width: 100px;" src="' . $fileUrl . '">';
                        } else if ($lay->name == "default") {
                            $fileUrl = Yii::$app->getModule('news')->getAssetsUrl() . '/layout_4.jpg';
                            echo '<img style="width: 100px;" src="' . $fileUrl . '">';
                        } else if ($lay->name == "loud story") {
                            $fileUrl = Yii::$app->getModule('news')->getAssetsUrl() . '/layout_5.jpg';
                            echo '<img style="width: 100px;" src="' . $fileUrl . '">';
                        }
                        ?>
                    </label>

                    <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div>
            <!-- <label class="">Featured Image</label> -->
        </div>
        <br>
        <?php
        if ($news->imgfile == "") {
            $fileUrl = Yii::$app->getModule('news')->getAssetsUrl() . '/noimage.jpg';
            ?>
            <div class="row">
                <div class=" col-md-3">
                    <img id="imgNoImage" class="thumbnail" src="<?= $fileUrl; ?>"
                         style="height: 120px; width: 100%; display: block;"><br>

                    <input class="btn btn-info" id="editNewImageUpload" type="file" name="files[]"
                           data-url="<?= $contentContainer->createUrl('/file/file/upload') ?>" multiple>
                    <p id="editNewImageUploadPara"></p>

                </div>
                <div class="col-md-9">

                </div>
            </div>

               <?php
        } else {
            $imageFile = \humhub\modules\file\models\File::findOne(['guid' => $news->imgfile]);
            $imageFileUrl = $imageFile->getUrl();
            ?>
            <div class="row">
                <div class=" col-md-3">
                    <i id="btnNewsChangeImageUpload" class="fa fa-upload colorInfo" aria-hidden="true"></i>
                    <img class="newsimage" class="thumbnail" src="<?= $imageFileUrl; ?>"
                         style="height: 120px; width: 100%; display: block;"><br>

                    <input style="display: none" id="newsChangeImageUpload" type="file" name="files[]"
                           data-url="<?= $contentContainer->createUrl('/file/file/upload') ?>" multiple>
                </div>
                <div class="col-md-9">

                </div>
            </div>

            <?php
        }
        ?>
    </div>

    <script type="text/javascript">
        $('#editNewImageUpload').fileupload({
            dataType: 'json',
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#fileprogress .bar').css(
                    'width',
                    progress + '%'
                );
            },
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('#editNewImageUploadPara').append(file.name);
                    $('#imgNoImage').attr('src', file.url);
                    $('#editguid').val(file.guid);
                });
            },
        });
        var editNewsBeforeSendHandler = function () {
            $(".wall_<?= $news->getUniqueId() ?>").find('.errorMessage').empty().hide();
        }
        var editNewsResultHandler = function (json) {
            var $entry = $(".wall_<?= $news->getUniqueId() ?>");
            if (json.success) {
                $entry.replaceWith(json.output);
                if (json.authorchanged) {
                }
            } else if (json.errors) {
                var $errorMessage = $entry._find('.errorMessage');
                var errors = '';
                $.each(json.errors, function (key, value) {
                    errors += value + '<br />';
                })
                $errorMessage.html(errors).show();
            }
        }
    </script>

    <div class="content_edit">
        <hr/>

        <?php
        echo \humhub\widgets\AjaxButton::widget([
            'label' => 'Save',
            'ajaxOptions' => [
                'dataType' => 'json',
                'type' => 'POST',
                'beforeSend' => 'editNewsBeforeSendHandler',
                'success' => 'editNewsResultHandler',
                'url' => $news->content->container->createUrl('/news/news/edit', ['id' => $news->id]),
            ],
            'htmlOptions' => [
                'class' => 'btn btn-primary btn-comment-submit',
                'id' => 'news_edit_post_' . $news->id,
                'type' => 'submit'
            ]
        ]);
        echo '&nbsp;';
        echo \humhub\widgets\AjaxButton::widget([
            'label' => 'Cancel',
            'ajaxOptions' => [
                'type' => 'POST',
                'success' => new \yii\web\JsExpression('function(html){ $(".wall_' . $news->getUniqueId() . '").replaceWith(html);}'),
                'url' => $news->content->container->createUrl('/news/news/reload', ['id' => $news->id]),
            ],
            'htmlOptions' => [
                'class' => 'btn btn-danger btn-comment-submit',
                'id' => 'news_edit_cancel_post' . $news->id
            ]
        ]);
        ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
