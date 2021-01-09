<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency_rate}}`.
 */
class m210109_064855_create_currency_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency_rate}}', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer(),
            'rate' => $this->float(),
            'old_rate' =>$this->float(),
            'date' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency_rate}}');
    }
}
