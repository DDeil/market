<?php

use yii\db\Migration;

/**
 * Class m220428_124645_change
 */
class m220428_124645_change extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('order', 'date', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'date');

    }

}
