<?php

use yii\db\Migration;

/**
 * Handles the creation for table `news_news_layout`.
 */
class m160617_081440_create_news_news_layout extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('news_news_layout', [
            'id' => $this->primaryKey(),
            'imagepath'=>$this->string(255),
            'name'=>$this->string(45)->notNull(),
            'background'=>$this->string(100),
            'description'=>$this->string(255),
        ]);
        $this->insert('news_news_layout',array(
            'imagepath'=>'',
            'name'=>'default',
            'background'=>'',
            'description'=>''
        ) );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('news_news_layout');
    }
}
