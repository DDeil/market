<?php

use yii\db\Migration;

/**
 * Class m220524_123510_create_table_promotion
 */
class m220524_123510_create_table_promotion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promotion',[
            'id'=>$this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'rate' => $this->integer()->notNull(),
            'date_from' => $this->string(),
            'date_to' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promotion');
    }

}
