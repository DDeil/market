<?php

use yii\db\Migration;

/**
 * Class m220120_092027_add_create_at_to_product
 */
class m220120_092027_add_create_at_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'create_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'create_at');
    }
}
