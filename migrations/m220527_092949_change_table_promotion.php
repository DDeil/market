<?php

use yii\db\Migration;

/**
 * Class m220527_092949_change_table_promotion
 */
class m220527_092949_change_table_promotion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('promotion', 'date_from');
        $this->dropColumn('promotion', 'date_to');
        $this->addColumn('promotion', 'date_begin', $this->dateTime());
        $this->addColumn('promotion', 'date_end', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->addColumn('promotion', 'date_from', $this->dateTime());
        $this->addColumn('promotion', 'date_to', $this->dateTime());
    }
}
