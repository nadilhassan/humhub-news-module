<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/17/2016
 * Time: 2:50 PM
 */
?>

<div class="panel" style="padding: 20px 10px;">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                       aria-expanded="false" aria-controls="collapseOne">
                        <span class="colorPrimary">News Layout Option </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <small>(Clik here to hide)</small>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                <?php
                \humhub\compat\CActiveForm::begin();
                $appendError = '';
                if (!(is_null($currentlayout))) {

                } else {
                    $appendError = "Please select a layout.";
                }

                ?>
                <div class="panel-body" style="padding: 10px;">
                    <div class="col-md-12 changeLayoutResponse">
                        <label class="colorDanger"><?= $appendError; ?></label>

                    </div>
                    <?php
                    foreach ($layouts as $lay):

                        $appendChecked = '';
                        if (!(is_null($currentlayout))) {
                            if ($lay->id == $currentlayout->layoutid) {
                                $appendChecked = 'checked';

                            } else {
                                $appendChecked = '';
                            }
                        }

                        ?>
                        <label class="change_layout">
                            <p class="text-center"><?= strtoupper($lay->name) ?></p>
                            <input <?= $appendChecked ?> id="lay<?= $lay->id; ?>" type="radio" name="lay"
                                                         value="<?= $lay->id; ?>"/>


                            <?php
                            if($lay->name=="loud"){
                                echo '<img style="width: 100px;" src="'.$bundle->baseUrl.'/layout_4.jpg">';
                                echo '<p  class="text-center">Background<br><strong style=" color: #'.$lay->background.';">PINK</strong></p>';
                            }else if($lay->name=="quite") {
                                echo '<img style="width: 100px;" src="'.$bundle->baseUrl.'/layout_2.jpg">';
                                echo '<p  class="text-center">Background<br><strong style=" color: #2DBD26;">GREEN</strong></p>';
                            }else if($lay->name=="default" ){
                                echo '<img style="width: 100px;" src="'.$bundle->baseUrl.'/layout_4.jpg">';
                                echo '<p  class="text-center">Background<br><strong>DEFAULT</strong></p>';

                            }else if($lay->name=="loud story"){
                                echo '<img style="width: 100px;" src="'.$bundle->baseUrl.'/layout_5.jpg">';

                                echo '<p  class="text-center">Background<br><strong>DEFAULT</strong></p>';

                            }
                            ?>

                        </label>
                        <?php
                    endforeach;
                    ?>
                    <script type="text/javascript">

                        var editNewsLayoutChangeHandler=function (json) {
                            $('.changeLayoutResponse').empty().append(
                                '<div class="alert alert-success alert-dismissible fade in" role="alert">' +
                                ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">×</span></button> <strong>Layout Changed Saved Successfully!</strong> </div>'
                            );
                        }
                    </script>

                    <?php
                    echo \humhub\widgets\AjaxButton::widget([
                        'label' => 'Save',
                        'ajaxOptions' => [
                            'dataType' => 'json',
                            'type' => 'POST',
                            'success' => 'editNewsLayoutChangeHandler',
                            'url' => $contentContainer->createUrl('/news/news/changelayout'),

//                            'url'=>'news/news/changelayout',
//                            'url'=>$news->content->container->createUrl('/news/news/changelayout'),
                        ],
                        'htmlOptions' => [
                            'class' => 'btn btn-info pull-right btn-comment-submit',
                            'id' => 'btn_change_layout',
                            'type' => 'submit'
                        ],
                    ])
                    ?>
                    <?php CActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>


</div>

