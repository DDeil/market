<?php

use yii\db\Migration;

/**
 * Class m220103_125041_create_table_user
 */
class m220103_125041_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'last_name' => $this->string(),
            'phone' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
