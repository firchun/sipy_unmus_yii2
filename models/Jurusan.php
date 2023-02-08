<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurusan".
 *
 * @property int $id
 * @property int $id_fakultas
 * @property string $jurusan
 *
 * @property DataYudisium[] $dataYudisia
 * @property Fakultas $fakultas
 * @property Users[] $users
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fakultas', 'jurusan'], 'required'],
            [['id_fakultas'], 'integer'],
            [['jurusan'], 'string', 'max' => 255],
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
            'id_fakultas' => 'Fakultas',
            'jurusan' => 'Jurusan',
        ];
    }

    /**
     * Gets query for [[DataYudisia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataYudisia()
    {
        return $this->hasMany(DataYudisium::class, ['id_jurusan' => 'id']);
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
        return $this->hasMany(Users::class, ['id_jurusan' => 'id']);
    }
}
