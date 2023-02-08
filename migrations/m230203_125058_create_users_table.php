<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230203_125058_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255),
            'password' => $this->string(255),
            'authKey' => $this->string(255),
            'accessToken' => $this->string(255),
            'nama_lengkap' => $this->string(255),
            'email' => $this->string(255),
            'tempat_lahir' => $this->string(255),
            'tanggal_lahir' => $this->date(),
            'foto' => $this->string(255),
            'id_fakultas' => $this->integer(12),
            'id_jurusan' => $this->integer(12),
            'jenis_kelamin' => $this->integer(10),
            'role' => $this->integer(12),
            'npm' => $this->string(12),
            'nik' => $this->string(12),
            'no_hp' => $this->string(15),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
