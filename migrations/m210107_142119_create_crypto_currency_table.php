<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%crypto_currency}}`.
 */
class m210107_142119_create_crypto_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%crypto_currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'title' => $this->string(),
            'date' =>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%crypto_currency}}');
    }
}
