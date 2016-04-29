<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $email
 * @property string $secondName
 * @property string $firstName
 * @property string $midleName
 * @property integer $idCity
 * @property integer $idUniversity
 * @property integer $idFacultet
 * @property string $position
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email', 'secondName', 'firstName', 'midleName', 'idCity', 'idUniversity', 'idFacultet', 'position'], 'required'],
            [['id', 'idCity', 'idUniversity', 'idFacultet'], 'integer'],
            [['email', 'secondName', 'firstName', 'midleName', 'position'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'secondName' => 'Second Name',
            'firstName' => 'First Name',
            'midleName' => 'Midle Name',
            'idCity' => 'Id City',
            'idUniversity' => 'Id University',
            'idFacultet' => 'Id Facultet',
            'position' => 'Position',
        ];
    }

    public static function findByUsername($email)
    {
       // return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
        return static::findOne([
                'email'=>$email
            ]);
    }
}
