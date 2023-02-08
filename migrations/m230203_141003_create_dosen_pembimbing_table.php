<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_pembimbing}}`.
 */
class m230203_141003_create_dosen_pembimbing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen_pembimbing}}', [
            'id' => $this->primaryKey(),
            'id_users' => $this->integer(10),
            'id_dosen' => $this->integer(10),
            'id_data_yudisium' => $this->integer(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen_pembimbing}}');
    }
}
