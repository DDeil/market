<?php

use yii\db\Migration;

/**
 * Class m220418_114841_change
 */
class m220418_114841_change extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'address', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'address');
    }


}
