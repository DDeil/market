<?php

use yii\db\Migration;

/**
 * Class m220414_115455_change_table_order
 */
class m220414_115455_change_table_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'date');
    }

}
