<?php

use yii\db\Migration;

/**
 * Handles the creation for table `news_table`.
 */
class m160617_062631_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('news_news', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'layout_id'=>$this->integer(11),
            'text'=>$this->text()->notNull(),
            'created_at'=>$this->dateTime()->notNull(),
            'created_by'=>$this->integer(11)->notNull(),
            'imgfile'=>$this->string(255),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('news_news');
    }
}
