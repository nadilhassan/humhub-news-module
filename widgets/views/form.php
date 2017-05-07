<?php

use yii\helpers\Html;
use yii\helpers\Url;
use humhub\modules\user\widgets\UserPicker;

humhub\modules\news\Assets::register($this);
?>

<br>

<div id="txtEditorNews" class="row">
    <div class="col-md-12">

        <div id="">
            <div class="arrow"></div>

            <div class="col-md-12 ">

                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                <div class="form-group">
                    <?= Html::textInput('title', '', array('id' => 'contentForm_title', 'class' => 'form-control contentForm', 'placeholder' => 'Title'))
                    ?></div>
                <!-- <iframe style="height: 350px; width: 100%;border: 3px solid #9d9d9d;" name="text"
                    class="form-control autosize contentForm"     id="contentForm_text"></iframe>-->
                <div class="form-group">
                    <?= Html::textArea("text", '', array('id' => 'contentForm_text', 'class' => 'form-control autosize contentForm', 'rows' => '14', "tabindex" => "1", 'placeholder' => 'Write something...')); ?>
                    <?= \humhub\widgets\MarkdownEditor::widget(array('fieldId' => 'contentForm_text')); ?>
                    <!--                        --><?php //echo \humhub\widgets\RichTextEditor::widget(array('id' => 'contentForm_text')); ?>
                </div>

                <div class="form-group">
                    <a class="colorPrimary" role="button" data-toggle="collapse" href="#authorCollapse"
                       aria-expanded="false" aria-controls="collapseExample">
                        Edit Author
                    </a>

                    <div class="collapse" style="margin-top: 15px;" id="authorCollapse">
                        <div class="">
                            <?= Html::textInput('changeAuthor', '', array('id' => 'changeAuthor', 'placeholder' => '')); ?>

                            <?=
                            UserPicker::widget(array(
                                'inputId' => 'changeAuthor',
                                'userSearchUrl' => $container->createUrl('/space/membership/search', array('keyword' => '-keywordPlaceholder-')),
                                'maxUsers' => 10,
                                'placeholderText' => 'Assign An Author',
                            ));
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <a class="colorPrimary" role="button" data-toggle="collapse" href="#collapseNewsLay"
                       aria-expanded="false" aria-controls="collapseExample">
                        Edit Layout
                    </a>

                    <div class="collapse" id="collapseNewsLay" style="margin-top: 15px;">
                        <div class="">
                            <?php
                            foreach ($layouts as $lay):
                                ?>
                                <label class="change_layout">
                                    <p class="text-center"><?= strtoupper($lay->name) ?></p>
                                    <input id="lay<?= $lay->id; ?>" type="radio" name="lay"
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

                <!-- --><? /*= Html::endForm() */ ?>
            </div>
        </div>
    </div>
</div>
<br>

<?php //echo Html::textArea("text", '', array('id' => 'contentForm_text', 'class' => 'form-control autosize contentForm', 'rows' => '14', "tabindex" => "1", 'placeholder' => 'Write something...'));
?>
<!--<script type="text/javascript">
    $(function () {
        $('#featuredImageFile').fileupload({
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
                    alert(file.name);
                    $('<p/>').text(file.name).appendTo(document.body);
                });
            },
        });
    });
</script>
-->
