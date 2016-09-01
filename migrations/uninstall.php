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
        echo "m160629_053040_uninstall cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
