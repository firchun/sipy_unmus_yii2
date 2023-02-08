<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gelombang}}`.
 */
class m230203_123222_create_gelombang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gelombang}}', [
            'id' => $this->primaryKey(),
            'kode_gelombang' => $this->string(50),
            'gelombang' => $this->string(12),
            'tahun' => $this->string(12),
            'awal_daftar' => $this->string(255),
            'akhir_daftar' => $this->string(255),
            'pelaksanaan' => $this->string(255),
            'status' => $this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gelombang}}');
    }
}
