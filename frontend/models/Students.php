<?php

namespace frontend\models;

use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\base\Security;
use Yii;

use frontend\models\Universities;
use frontend\models\Group;
use frontend\models\Napravlenie;
use frontend\models\Facultet;/**
 * This is the model class for table "students".
 *
 * @property integer $idStudent
 * @property string $secondName
 * @property string $firstName
 * @property string $midleName
 * @property integer $idCity
 * @property integer $idUniversity
 * @property integer $idFacultet
 * @property integer $idLevel
 * @property integer $kurs
 * @property integer $idNapravlenie
 * @property integer $idGroup
 *
 * @property User $idStudent0
 * @property Cities $idCity0
 * @property User $idStudent1
 * @property Facultet $idFacultet0
 * @property Napravlenie $idNapravlenie0
 * @property Sgroup $idGroup0
 */
class Students extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'idCity', 'idUniversity', 'idFacultet', 'idLevel', 'kurs', 'idNapravlenie', 'idGroup'], 'integer'],
            // [['secondName', 'firstName', 'midleName', 'idLevel'], 'required'],
            [['secondName', 'firstName', 'midleName'], 'string', 'max' => 64],
            [['secondName'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idStudent' => 'Id Student',
            'secondName' => 'Second Name',
            'firstName' => 'First Name',
            'midleName' => 'Midle Name',
            'idCity' => 'Id City',
            'idUniversity' => 'Id University',
            'idFacultet' => 'Id Facultet',
            'idLevel' => 'Id Level',
            'kurs' => 'Kurs',
            'idNapravlenie' => 'Id Napravlenie',
            'idGroup' => 'Id Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(User::className(), ['id' => 'idStudent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCity0()
    {
        return $this->hasOne(Cities::className(), ['id' => 'idCity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent1()
    {
        return $this->hasOne(User::className(), ['id' => 'idStudent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultet0()
    {
        return $this->hasOne(Facultet::className(), ['id' => 'idFacultet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNapravlenie0()
    {
        return $this->hasOne(Napravlenie::className(), ['id' => 'idNapravlenie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup0()
    {
        return $this->hasOne(Sgroup::className(), ['id' => 'idGroup']);
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
        return $this->idStudent;
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
