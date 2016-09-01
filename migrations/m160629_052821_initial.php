<?php

use yii\db\Migration;

class m160629_052821_initial extends Migration
{
    public function up()
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

        $this->createTable('news_news_layout', [
            'id' => $this->primaryKey(),
            'imagepath'=>$this->string(255),
            'name'=>$this->string(45)->notNull(),
            'background'=>$this->string(100),
            'description'=>$this->string(255),
        ]);
        $this->insert('news_news_layout',[
            'imagepath'=>'',
            'name'=>'default',
            'background'=>'',
            'description'=>''
        ]);
        $this->insert('news_news_layout',
            [
                'imagepath'=>'',
                'name'=>'quite',
                'background'=>'CBF5AB',
                'description'=>'Layout in green background colour'
            ]);
        $this->insert('news_news_layout',
            [
                'imagepath'=>'',
                'name'=>'loud',
                'background'=>'F5C4F4',
                'description'=>'Layout in pink backgroudn colour'
            ]);
        $this->insert('news_news_layout',
            [
                'imagepath'=>'',
                'name'=>'loud story',
                'background'=>'',
                'description'=>'No background colour'
            ]);






    }

    public function down()
    {
        echo "m160629_052821_initial cannot be reverted.\n";

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
