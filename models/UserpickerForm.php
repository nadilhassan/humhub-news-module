<?php

/**
 * Author: Felli
 */

namespace humhub\modules\news\models\forms;

use Yii;
use yii\helpers\Html;
use yii\base\Model;

class UserpickerForm extends Model
{
    public $guids = [];
    
    public function rules()
    {
        return [
            ['guids', 'safe']
        ];
    }
    
    public function getSelectionString() {
        if(empty($this->guids)) {
            return 'Empty selection!';
        } else {
            return Html::encode(implode(', ', $this->guids));
        }
    }
}
