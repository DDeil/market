<?php

use yii\db\Migration;

/**
 * Class m220221_161909_change_table_order
 */
class m220221_161909_change_table_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('order', 'product_id');
        $this->addColumn('order', 'name', $this->string());
        $this->addColumn('order', 'phone', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->addColumn('order', 'product_id', $this->integer()->notNull());
        $this->dropColumn('order', 'name');
        $this->dropColumn('order', 'phone');


    }


}
