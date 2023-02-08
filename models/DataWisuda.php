<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_wisuda".
 *
 * @property int $id
 * @property int $id_users
 * @property int $id_data_yudisium
 * @property int $id_gelombang
 * @property string $tanggal_yudisium
 * @property string $created_at
 *
 * @property DataYudisium $dataYudisium
 * @property Gelombang $gelombang
 * @property Users $users
 */
class DataWisuda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_wisuda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_users', 'id_data_yudisium', 'id_gelombang', 'tanggal_yudisium', 'id_fakultas', 'id_jurusan'], 'required'],
            [['id_users', 'id_data_yudisium', 'id_gelombang', 'id_fakultas', 'id_jurusan'], 'integer'],
            [['created_at'], 'safe'],
            [['tanggal_yudisium'], 'string', 'max' => 255],
            [['id_gelombang'], 'exist', 'skipOnError' => true, 'targetClass' => Gelombang::class, 'targetAttribute' => ['id_gelombang' => 'id']],
            [['id_data_yudisium'], 'exist', 'skipOnError' => true, 'targetClass' => DataYudisium::class, 'targetAttribute' => ['id_data_yudisium' => 'id']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_users' => 'id']],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::class, 'targetAttribute' => ['id_fakultas' => 'id']],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::class, 'targetAttribute' => ['id_jurusan' => 'id']],
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
            'id_data_yudisium' => 'Id Data Yudisium',
            'id_gelombang' => 'Id Gelombang',
            'id_fakultas' => 'Id fakultas',
            'id_jurusan' => 'Id jurusan',
            'tanggal_yudisium' => 'Tanggal Yudisium',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[DataYudisium]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataYudisium()
    {
        return $this->hasOne(DataYudisium::class, ['id' => 'id_data_yudisium']);
    }

    /**
     * Gets query for [[Gelombang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGelombang()
    {
        return $this->hasOne(Gelombang::class, ['id' => 'id_gelombang']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_users']);
    }
    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['id' => 'id_fakultas']);
    }
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::class, ['id' => 'id_jurusan']);
    }
}
