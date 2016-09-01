<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/6/2016
 * Time: 11:19 AM
 */
humhub\modules\news\Assets::register($this);

use humhub\compat\CActiveForm;
use yii\helpers\Html;

?>

<div class="content_edit" id="poll_edit_<?php echo $news->id; ?>">
    <p class="errorMessage" style="color:#ff8989;display:none"></p>
    <?php
    $form = CActiveForm::begin(['id' => 'news-edit-form_' . $news->id]);
    echo $form->label($news, "title", ['class' => 'control-label']);
//    echo $form->hiddenField($news,"imgfile",['id'=>'feildguid'] );
    ?>
    <div class="form-group">
        <?php echo $form->textField($news, 'title', array('class' => 'form-control', 'id' => 'news_input_title_' . $news->id, 'placeholder' => 'Edit your news title...')); ?>


    </div>

    <div class="form-group">
        <?php
        echo $form->label($news, 'Body', ['class' => 'control-label'])
        ?>


        <?php echo $form->textArea($news, 'text', array('id' => 'news_input_text_' . $news->id, 'class' => 'form-control autosize contentForm', 'rows' => '14', "tabindex" => "1", 'placeholder' => 'Write something...')) ?>
        <?php echo \humhub\widgets\MarkdownEditor::widget(array('fieldId' => 'news_input_text_' . $news->id)); ?>
    </div>
    <div class="form-group">
        <a class="colorPrimary" role="button" data-toggle="collapse" href="#authorCollapseTwo" aria-expanded="false"
           aria-controls="collapseExample">
            Click here to change author?
        </a>
        <div class="collapse" id="authorCollapseTwo">
            <div class="">
                <?php echo Html::textInput('news_input_author', '', array('id' => 'news_input_author', 'placeholder' => '')); ?>

                <?php

                echo humhub\modules\user\widgets\UserPicker::widget(array(
                    'inputId' => 'news_input_author',
                    'userSearchUrl' => $contentContainer->createUrl('/space/membership/search', array('keyword' => '-keywordPlaceholder-')),
                    'maxUsers' => 10,
                    'placeholderText' => 'Assign An Author',
                ));
                ?>
            </div>
        </div>


    </div>
    <div class="form-group">
        <a class="colorPrimary" role="button" data-toggle="collapse" href="#collapseEditNewsLay" aria-expanded="false"
           aria-controls="collapseExample">
            Change News Layout
        </a>
        <div class="collapse" id="collapseEditNewsLay">
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
                            echo '<img style="width: 100px;" src="uploads/news/layout_4.jpg">';
                            echo '<p  class="text-center">Background<br><strong style=" color: #' . $lay->background . ';">PINK</strong></p>';
                        } else if ($lay->name == "quite") {
                            echo '<img style="width: 100px;" src="uploads/news/layout_2.jpg">';
                            echo '<p  class="text-center">Background<br><strong style=" color: #2DBD26;">GREEN</strong></p>';
                        } else if ($lay->name == "default") {
                            echo '<img style="width: 100px;" src="uploads/news/layout_4.jpg">';
                            echo '<p  class="text-center">Background<br><strong>WHITE</strong></p>';

                        } else if ($lay->name == "loud story") {
                            echo '<img style="width: 100px;" src="uploads/news/layout_5.jpg">';

                            echo '<p  class="text-center">Background<br><strong>WHITE</strong></p>';

                        }
                        ?>

                    </label>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <div class="form-group ">
        <div><label class="">Featured Image</label></div>
        <br>


        <?php
        if ($news->imgfile == "") {
            ?>
            <div class="row">
                <div class=" col-md-3">
                    <img class="thumbnail" src="uploads/news/noimage.jpg"
                         style="height: 180px; width: 100%; display: block;"><br>

                    <br>
                </div>
                <div class="col-md-9">

                </div>
            </div>

            <?php


        } else {
            ?>
            <div class="row">
                <div class="col-md-10">
                    <img
                        src="<?php echo '/conscioustheme/index.php?r=file%2Ffile%2Fdownload&guid=' . $news->imgfile; ?>"
                        style=" width: 100%; display: block;">
                </div>
            </div>
            <?php
            echo
            \humhub\widgets\AjaxButton::widget([
                'label' => 'Remove Image',
                'ajaxOptions' => [
                    'dataType' => 'json',
                    'type' => 'POST',

                    'success' => 'removeFeaturedImage',
                    'url' => $news->content->container->createUrl('/news/news/removeimage', ['image' => $news->imgfile, 'id' => $news->id]),

                ],
                'htmlOptions' => [
                    'class' => 'btn btn-info btn-comment-submit',
                    'id' => 'news_edit_post_' . $news->id,
                    'type' => 'submit'
                ]
            ]);

        }
        ?>

    </div>
    <div class="form-group">
        <label class="">Featured Image</label>
        <br>
        <input id="editNewImage" type="file" name="files[]" data-url="<?php echo $contentContainer->createUrl('/file/file/upload') ?>" >

        <div id="fileprogress" >
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>

</div>

</div>
<script type="text/javascript">
    var editNewsBeforeSendHandler = function () {
        $(".wall_<?= $news->getUniqueId() ?>").find('.errorMessage').empty().hide();
    }
    var editNewsResultHandler = function (json) {
//            $("#newsform-loader_<?//= $news->id ?>//").addClass("hidden");
        var $entry = $(".wall_<?= $news->getUniqueId() ?>");
        if (json.success) {
            $entry.replaceWith(json.output);
            if(json.authorchanged){
//                    alert("author changed");
//                    $entry.find('.errorMessage').append('' +
//                        '<h3>dddddddd</h3>')

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


<!--   /* $(document).ready(function () {-->
<!---->
<!---->
<!--        $('#editNewImage').fileupload({-->
<!---->
<!--            dataType: 'json',-->
<!--            progressall: function (e, data) {-->
<!--                var progress = parseInt(data.loaded / data.total * 100, 10);-->
<!--                $('#fileprogress .bar').css(-->
<!--                    'width',-->
<!--                    progress + '%'-->
<!--                );-->
<!--            },-->
<!--            done: function (e, data) {-->
<!--                $.each(data.result.files, function (index, file) {-->
<!--                    $('#feildguid').val(file.guid);-->
<!--//                    alert(file.name+"ddd");-->
<!---->
<!--                });-->
<!--            },-->
<!---->
<!--        });-->
<!--    })*/-->



<div class="content_edit">
    <hr/>

    <?php

    echo
    \humhub\widgets\AjaxButton::widget([
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
<?php CActiveForm::end(); ?>

</div>


