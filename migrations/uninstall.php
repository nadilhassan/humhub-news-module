<?php

use yii\db\Migration;

class uninstall extends Migration
{
    public function up()
    {
        $this->dropTable('news_news');
        $this->dropTable('news_news_layout');
    }
    public function down()
    {
        echo "uninstall does not support migration down.\n";
        return false;
    }
}
