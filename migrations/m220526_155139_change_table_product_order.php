<?php

use yii\db\Migration;

/**
 * Class m220526_155139_change_table_product_order
 */
class m220526_155139_change_table_product_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_order','promo_price', $this->float()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_order','promo_price');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220526_155139_change_table_product_order cannot be reverted.\n";

        return false;
    }
    */
}
