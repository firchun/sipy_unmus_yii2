<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gelombang".
 *
 * @property int $id
 * @property string $kode_gelombang
 * @property string $gelombang
 * @property string $tahun
 * @property string $awal_daftar
 * @property string $akhir_daftar
 * @property string $pelaksanaan
 * @property int $status
 *
 * @property DataWisuda[] $dataWisudas
 * @property Status $status0
 */
class Gelombang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gelombang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_gelombang', 'gelombang', 'tahun', 'awal_daftar', 'akhir_daftar', 'pelaksanaan', 'status'], 'required'],
            [['status'], 'integer'],
            [['kode_gelombang'], 'string', 'max' => 50],
            [['gelombang', 'tahun'], 'string', 'max' => 12],
            [['awal_daftar', 'akhir_daftar', 'pelaksanaan'], 'string', 'max' => 255],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_gelombang' => 'Kode Gelombang',
            'gelombang' => 'Gelombang',
            'tahun' => 'Tahun',
            'awal_daftar' => 'Awal Daftar',
            'akhir_daftar' => 'Akhir Daftar',
            'pelaksanaan' => 'Pelaksanaan',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[DataWisudas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataWisudas()
    {
        return $this->hasMany(DataWisuda::class, ['id_gelombang' => 'id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::class, ['id' => 'status']);
    }
}
