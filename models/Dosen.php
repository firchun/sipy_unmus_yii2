<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $NIP
 * @property int $id_jurusan
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'nip', 'id_jurusan'], 'required'],
            [['id_jurusan'], 'integer'],
            [['nama_lengkap'], 'string', 'max' => 255],
            [['nip'], 'string', 'max' => 50],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nip' => 'NIP / NIDN / NIPPPK',
            'id_jurusan' => 'Jurusan',
        ];
    }
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::class, ['id' => 'id_jurusan']);
    }
}
