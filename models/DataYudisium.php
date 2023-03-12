<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_yudisium".
 *
 * @property int $id
 * @property int $id_users
 * @property int $id_jurusan
 * @property string $krs
 * @property string $khs
 * @property string $transkrip
 * @property string $judul_skripsi
 * @property string $cover_skripsi
 * @property string $persetujuan_skripsi
 * @property string $pengesahan_skripsi
 * @property string $ijazah_terakhir
 * @property string $sk_bimbingan
 * @property string $ktp
 * @property string $persetujuan 0= belum , 1= sudah 
 * @property string $tanggal_yudisium
 *
 * @property DataWisuda[] $dataWisudas
 * @property Jurusan $jurusan
 * @property Users $users
 */
class DataYudisium extends \yii\db\ActiveRecord
{
    public $file_krs;
    public $file_khs;
    public $file_cover;
    public $file_persetujuan;
    public $file_pengesahan;
    public $file_ijazah;
    public $file_sk;
    public $file_transkrip;
    public $file_ktp;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_yudisium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_users', 'id_jurusan', 'krs', 'khs', 'transkrip', 'judul_skripsi', 'cover_skripsi', 'persetujuan_skripsi', 'pengesahan_skripsi', 'ijazah_terakhir', 'sk_bimbingan', 'ktp', 'ipk'], 'required'],
            [['id_users', 'id_jurusan'], 'integer'],
            [['judul_skripsi'], 'string'],
            [['krs', 'khs', 'transkrip', 'cover_skripsi', 'persetujuan_skripsi', 'pengesahan_skripsi', 'ijazah_terakhir', 'sk_bimbingan', 'ktp', 'tanggal_yudisium'], 'string', 'max' => 255],
            [['persetujuan', 'ipk'], 'string', 'max' => 12],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_users' => 'id']],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::class, 'targetAttribute' => ['id_jurusan' => 'id']],
            ['file_krs', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_khs', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_ktp', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_cover', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_pengesahan', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_persetujuan', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_sk', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_transkrip', 'file', 'extensions' => 'jpg,jpeg,pdf'],
            ['file_ijazah', 'file', 'extensions' => 'jpg,jpeg,pdf'],
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
            'id_jurusan' => 'Id Jurusan',
            'krs' => 'Krs',
            'khs' => 'Khs',
            'transkrip' => 'Transkrip',
            'judul_skripsi' => 'Judul Skripsi',
            'cover_skripsi' => 'Cover Skripsi',
            'persetujuan_skripsi' => 'Persetujuan Skripsi',
            'pengesahan_skripsi' => 'Pengesahan Skripsi',
            'ijazah_terakhir' => 'Ijazah Terakhir',
            'sk_bimbingan' => 'Sk Bimbingan',
            'ktp' => 'Ktp',
            'persetujuan' => 'Persetujuan',
            'tanggal_yudisium' => 'Tanggal Yudisium',
            'ipk' => 'IPK'
        ];
    }

    /**
     * Gets query for [[DataWisudas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataWisudas()
    {
        return $this->hasMany(DataWisuda::class, ['id_data_yudisium' => 'id']);
    }

    /**
     * Gets query for [[Jurusan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::class, ['id' => 'id_jurusan']);
    }
    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['id' => 'id_fakultas']);
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
    public function getDosenPembimbing()
    {
        return $this->hasMany(DosenPembimbing::className(), ['id_data_yudisium' => 'id']);
    }

    public function setDosenPembimbing($value)
    {
        $this->loadRelated('DosenPembimbing', $value);
    }
}
