<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%crypto_currency_rate}}`.
 */
class m210107_142130_create_crypto_currency_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%crypto_currency_rate}}', [
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
        $this->dropTable('{{%crypto_currency_rate}}');
    }
}
