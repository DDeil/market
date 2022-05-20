<?php

use yii\db\Migration;

/**
 * Class m220517_132856_change_table_user
 */
class m220517_132856_change_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'type', $this->tinyInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220517_132856_change_table_user cannot be reverted.\n";

        return false;
    }
    */
}
