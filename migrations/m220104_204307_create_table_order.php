<?php

use yii\db\Migration;

/**
 * Class m220104_204307_create_table_order
 */
class m220104_204307_create_table_order extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id'         => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'status'     => $this->integer()->notNull(),
            'user_id'    => $this->integer(),
            'address'    => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
