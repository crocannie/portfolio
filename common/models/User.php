<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\base\Security;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role
 *
 * @property Students[] $students
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'role'], 'required'],
            [['password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'role'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idStudent' => 'id']);
    }

    public static function findByUsername($username)
    {
       // return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
        return static::findOne([
                'username'=>$username
            ]);
    }

    public static function findByEmail($email)
    {
        return static::findOne([
                'email'=>$email
            ]);
    }

    public function setPassword($password_hash)
    {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password_hash);
    }

    public function validatePassword($password_hash)
    {
        return Yii::$app->security->validatePassword($password_hash, $this->password_hash);
    }

    public static function findIdentity($id)
    {
        return static::findOne([
            'id'=>$id
        ]);
    }

public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->password;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($password)
    {
        return $this->getAuthKey() === $password;
    }
}
