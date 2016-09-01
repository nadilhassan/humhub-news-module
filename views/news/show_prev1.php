<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/1/2016
 * Time: 3:04 PM
 */
use humhub\compat\CActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $form = CActiveForm::begin();
//$form->action=['news/show'];

?>
<?php /*echo $form->errorSummary($model);*/ ?>
<div class="form-group ">
    <?php /*echo $form->labelEx($model, 'title')*/; ?>
    <?php   echo $form->textField($model, 'title', array('class' => 'form-control','placeholder'=>'Hei!, Title Me!')); ?>
    <?php echo $form->error($model, 'title' ,array('class'=>'colorDanger')); ?>
</div>
<div class="form-group">
    <?php /*echo $form->labelEx($model, 'text');*/ ?>
    <?php echo $form->textArea($model, 'text', array('rows' => 10, 'class' => 'form-control','placeholder'=>'Write something...')); ?>
    <?php echo $form->error($model, 'text',array('class'=>'colorDanger')); ?>
    <p class="help-block"><?php /*echo 'Note: You can use markdown syntax.'; */?></p>

</div>
<?php echo Html::submitButton('Save', array('class' => 'btn btn-primary')) . "&nbsp&nbsp"; ?>

<?php CActiveForm::end();

echo \humhub\modules\content\widgets\Stream::widget(array(
    'contentContainer' => $contentContainer,
    'streamAction' => '//news/news/stream',
    'messageStreamEmpty' => ($contentContainer->canWrite()) ?
        '<b>There are no polls yet!</b><br>Be the first and create one...' :
        '<b>There are no polls yet!</b>',
    'messageStreamEmptyCss' => ($contentContainer->canWrite()) ?
        'placeholder-empty-stream' :
        '',
));


?>

