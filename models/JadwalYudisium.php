<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal_yudisium".
 *
 * @property int $id
 * @property int $id_users
 * @property int $id_fakultas
 * @property string $awal_daftar
 * @property string $akhir_daftar
 * @property string $pelaksanaan
 * @property int $status
 * @property string $created_at
 *
 * @property Fakultas $fakultas
 * @property Users $users
 */
class JadwalYudisium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_yudisium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_users', 'id_fakultas', 'awal_daftar', 'akhir_daftar', 'pelaksanaan', 'status'], 'required'],
            [['id', 'id_users', 'id_fakultas', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['awal_daftar', 'akhir_daftar', 'pelaksanaan'], 'string', 'max' => 255],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_users' => 'id']],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::class, 'targetAttribute' => ['id_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_users' => 'Id Users',
            'id_fakultas' => 'Id Fakultas',
            'awal_daftar' => 'Awal Daftar',
            'akhir_daftar' => 'Akhir Daftar',
            'pelaksanaan' => 'Pelaksanaan',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Fakultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['id' => 'id_fakultas']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id' => 'id_users']);
    }
}
