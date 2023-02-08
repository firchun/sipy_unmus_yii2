<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_penguji}}`.
 */
class m230203_140625_create_dosen_penguji_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen_penguji}}', [
            'id' => $this->primaryKey(),
            'id_users' => $this->integer(10),
            'id_dosen' => $this->integer(10),
            'id_data_yudisium' => $this->integer(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen_penguji}}');
    }
}
