<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_wisuda}}`.
 */
class m230203_144056_create_data_wisuda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_wisuda}}', [
            'id' => $this->primaryKey(),
            'id_users' => $this->integer(10),
            'id_data_yudisium' => $this->integer(10),
            'id_gelombang' => $this->integer(10),
            'id_fakultas' => $this->integer(10),
            'id_jurusan' => $this->integer(10),
            'tanggal_yudisium' => $this->date(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data_wisuda}}');
    }
}
