<?php

use yii\db\Migration;

/**
 * Class m220120_093347_create_table_news
 */
class m220120_093347_create_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string()->notNull(),
            'description' => $this->text(),
            'image'       => $this->string(),
            'create_at'   => $this->dateTime(),
            'status'      => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}
