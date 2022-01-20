<?php

use yii\db\Migration;

/**
 * Class m220103_123953_create_table_product
 */
class m220103_123953_create_table_product extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'price'       => $this->double(),
            'image'       => $this->string(),
            'is_hit'      => $this->boolean(),
            'is_new'      => $this->boolean(),
            'type'        => $this->integer()->notNull(),
            'status'      => $this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
