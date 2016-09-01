<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/3/2016
 * Time: 9:36 AM
 */

namespace humhub\modules\news;


use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public  $css=[
      'news.css'
    ];
    public $js=[
        'jquery.fileupload.js',
        'jquery.iframe-transport.js',
        'news.js',

    ];
//    public $sourcePath = '@bower/select2';
    public $sourcePath = '';


    public function init()
    {
        $this->sourcePath=dirname(__FILE__).'/assets';
        parent::init();
    }
}