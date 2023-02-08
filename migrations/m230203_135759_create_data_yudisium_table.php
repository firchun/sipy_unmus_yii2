<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_yudisium}}`.
 */
class m230203_135759_create_data_yudisium_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_yudisium}}', [
            'id' => $this->primaryKey(),
            'id_users' => $this->integer(10),
            'id_jurusan' => $this->integer(10),
            'krs' => $this->string(255),
            'khs' => $this->string(255),
            'transkrip' => $this->string(255),
            'judul_skripsi' => $this->string(255),
            'cover_skripsi' => $this->string(255),
            'persetujuan_skripsi' => $this->string(255),
            'pengesahan_skripsi' => $this->string(255),
            'ijazah_terakhir' => $this->string(255),
            'sk_bimbingan' => $this->string(255),
            'ktp' => $this->string(255),
            'persetujuan' => $this->string(12),
            'tanggal_yudisium' => $this->date(),
            'ipk' => $this->string(12),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data_yudisium}}');
    }
}
