<?php

namespace common\models;

use common\models\Universities;
use common\models\Group;
use common\models\Napravlenie;
use common\models\Facultet;
use common\models\Sgroup;

use Yii;

/**
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
class Students extends \yii\db\ActiveRecord
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
            [['secondName', 'firstName', 'midleName', 'idLevel'], 'required'],
            [['secondName', 'firstName', 'midleName'], 'string', 'max' => 64]
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
}
