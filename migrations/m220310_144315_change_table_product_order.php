<?php

use yii\db\Migration;

/**
 * Class m220310_144315_change_table_product_order
 */
class m220310_144315_change_table_product_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_order','count_product', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_order','count_product');
    }

}
