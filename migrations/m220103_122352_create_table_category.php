<?php

use yii\db\Migration;

/**
 * Class m220103_122352_create_table_category
 */
class m220103_122352_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id'     => $this->primaryKey(),
            'name'   => $this->string()->notNull(),
            'status' => $this->boolean()->defaultValue(true),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
