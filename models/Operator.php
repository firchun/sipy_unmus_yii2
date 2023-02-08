<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operator".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $id_dosen
 * @property int $id_fakultas
 * @property string $no_hp
 * @property int $role
 * @property string $accessToken
 * @property string $authKey
 * @property string $created_at
 *
 * @property Dosen $dosen
 * @property Fakultas $fakultas
 * @property Role $role0
 */
class Operator extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password', 'id_dosen', 'id_fakultas', 'no_hp', 'role', 'accessToken', 'authKey'], 'required'],
            [['id', 'id_dosen', 'id_fakultas', 'role'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'password', 'accessToken', 'authKey'], 'string', 'max' => 255],
            [['no_hp'], 'string', 'max' => 20],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::class, 'targetAttribute' => ['id_fakultas' => 'id']],
            [['id_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::class, 'targetAttribute' => ['id_dosen' => 'id']],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_dosen' => 'Id Dosen',
            'id_fakultas' => 'Id Fakultas',
            'no_hp' => 'No Hp',
            'role' => 'Role',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
            'created_at' => 'Created At',
        ];
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
     * Gets query for [[Fakultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['id' => 'id_fakultas']);
    }

    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Role::class, ['id' => 'role']);
    }



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    public function beforeSave($insert)
    {
        $old = $this->password;
        if ($old) {
            $this->password = md5($this->password);
        }
        return parent::beforeSave($insert);
    }
    public function changePassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save(false);
    }
}
