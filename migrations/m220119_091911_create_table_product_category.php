<?php

use yii\db\Migration;

/**
 * Class m220119_091911_create_table_product_category
 */
class m220119_091911_create_table_product_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('product_category', [
            'id'          => $this->primaryKey(),
            'product_id'  => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('product_category-category_id-category-id', 'product_category', 'category_id', 'category', 'id');
        $this->addForeignKey('product_category-product_id-product-id', 'product_category', 'product_id', 'product', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_category');
    }
}
