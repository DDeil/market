<?php

use yii\db\Migration;

/**
 * Class m220103_123953_create_table_product
 */
class m220103_123953_create_table_product extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'price'       => $this->double(),
            'category_id' => $this->integer()->notNull(),
            'image'       => $this->string(),
        ]);

        $this->addForeignKey('product-category_id-category-id', 'product', 'category_id', 'category', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
