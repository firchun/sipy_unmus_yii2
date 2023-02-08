<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jurusan}}`.
 */
class m230203_131000_create_jurusan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jurusan}}', [
            'id' => $this->primaryKey(),
            'id_fakultas' => $this->integer(12),
            'jurusan' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jurusan}}');
    }
}
