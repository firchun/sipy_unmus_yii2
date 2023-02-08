<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fakultas}}`.
 */
class m230203_130854_create_fakultas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fakultas}}', [
            'id' => $this->primaryKey(),
            'fakultas' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fakultas}}');
    }
}
