<?php

use yii\db\Migration;

/**
 * Class m220217_153329_create_table_product_order
 */
class m220217_153329_create_table_product_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_order', [
            'product_id' => $this->integer()->notNull(),
            'order_id'   => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('product_order-order_id-order-id', 'product_order', 'order_id', 'order', 'id');
        $this->addForeignKey('product_order-product_id-product-id', 'product_order','product_id', 'product', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('product_order');
    }
}
