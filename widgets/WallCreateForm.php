<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/2/2016
 * Time: 12:04 PM
 */

namespace humhub\modules\news\widgets;


use humhub\modules\content\widgets\WallCreateContentForm;
use humhub\modules\news\models\EditForm;
use humhub\modules\news\models\News;
use humhub\modules\news\models\NewsLayouts;

class WallCreateForm extends WallCreateContentForm
{

    public $submitUrl = '/news/news/create';
    public $submitButtonText='Save';

    

    public function renderForm()
    {

        $formModel=new EditForm();
        $model=new News();
        $layouts = NewsLayouts::find()
            ->all();
//        return $this->render('form_prev2',array('model'=>$model,'news'=>$model));
        return $this->render('form',array('model'=>$model,'news'=>$model,
            'layouts' => $layouts,
            'container' => $this->contentContainer));

    }

    public function run()
    {
        if ($this->contentContainer instanceof \humhub\modules\space\models\Space) {


            if (!$this->contentContainer->permissionManager->can(new \humhub\modules\news\permissions\CreateNews())) {

//               $this->contentContainer->created_by=3;
                return;
            }
        }

        return parent::run();
    }
}