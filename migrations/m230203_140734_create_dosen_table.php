<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen}}`.
 */
class m230203_140734_create_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen}}', [
            'id' => $this->primaryKey(),
            'nama_lengkap' => $this->string(255),
            'nip' => $this->string(50),
            'id_jurusan' => $this->integer(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen}}');
    }
}
