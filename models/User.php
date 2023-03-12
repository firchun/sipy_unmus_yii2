<?php

namespace app\models;

use Yii;
use yii\base\Security;
use yii\web\UploadedFile;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $file;
    public $confirm_password;
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'nama_lengkap', 'email', 'no_hp', 'username'], 'required'],
            [['id_fakultas', 'id_jurusan', 'role', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'password', 'authKey', 'accessToken', 'nama_lengkap', 'email', 'tempat_lahir', 'tanggal_lahir', 'foto'], 'string', 'max' => 255],
            [['no_hp'], 'string', 'max' => 15],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['npm'], 'string', 'max' => 12],
            [['nik'], 'string', 'max' => 12],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::class, 'targetAttribute' => ['id_fakultas' => 'id']],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::class, 'targetAttribute' => ['id_jurusan' => 'id']],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
            ['file', 'file', 'extensions' => 'jpg,jpeg,png'],
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
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'no_hp' => 'No Hp',
            'jenis_kelamin' => 'Jenis Kelamin',
            'npm' => 'Npm',
            'nik' => 'Nik',
            'id_fakultas' => 'Id Fakultas',
            'id_jurusan' => 'Id Jurusan',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'role' => 'Role',
            'id_status' => 'Status',
            'created_at' => 'Created At',
            'foto' => 'Foto',
        ];
    }
    public function getFotoPath()
    {
        $path = self::getPath() . $this->id;
        if (file_exists($path)) {
            return Yii::$app->urlManager->getBaseUrl() . "/images/user/" . $this->id;
        }
        return null;
    }

    public static function getPath()
    {
        return Yii::getAlias('@app/../web/images/user/') . DIRECTORY_SEPARATOR;
    }

    /**
     * Gets query for [[DataWisudas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataWisudas()
    {
        return $this->hasMany(DataWisuda::class, ['id_users' => 'id']);
    }

    /**
     * Gets query for [[DataYudisia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataYudisium()
    {
        return $this->hasMany(DataYudisium::class, ['id_users' => 'id']);
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
     * Gets query for [[Jurusan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::class, ['id' => 'id_jurusan']);
    }

    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_status']);
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
    // public function validatePassword($password)
    // {
    //     return $this->password === $password;
    // }
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    // public function beforeSave($insert)
    // {
    //     $old = $this->password;
    //     if ($old) {
    //         $this->password = md5($this->password);
    //     }
    //     return parent::beforeSave($insert);
    // }
    public function changePassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save(false);
    }
}
