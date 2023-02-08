<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen_pembimbing".
 *
 * @property int $id
 * @property int $id_users
 * @property int $id_dosen
 * @property int $id_data_yudisium
 *
 * @property DataYudisium $dataYudisium
 * @property Dosen $dosen
 * @property Users $users
 */
class DosenPembimbing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen_pembimbing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_users', 'id_dosen', 'id_data_yudisium'], 'required'],
            [['id_users', 'id_dosen', 'id_data_yudisium'], 'integer'],
            [['id'], 'safe'],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_users' => 'id']],
            [['id_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::class, 'targetAttribute' => ['id_dosen' => 'id']],
            [['id_data_yudisium'], 'exist', 'skipOnError' => true, 'targetClass' => DataYudisium::class, 'targetAttribute' => ['id_data_yudisium' => 'id']],
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
            'id_dosen' => 'Id Dosen',
            'id_data_yudisium' => 'Id Data Yudisium',
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
     * Gets query for [[Dosen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::class, ['id' => 'id_dosen']);
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
