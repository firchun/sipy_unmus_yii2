<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $id
 * @property string $fakultas
 *
 * @property Jurusan[] $jurusans
 * @property Users[] $users
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultas'], 'required'],
            [['fakultas'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fakultas' => 'Fakultas',
        ];
    }

    /**
     * Gets query for [[Jurusans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJurusans()
    {
        return $this->hasMany(Jurusan::class, ['id_fakultas' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['id_fakultas' => 'id']);
    }
}
