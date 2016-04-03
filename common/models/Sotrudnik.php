<?php

namespace common\models;

use Yii;
use yii\web\View;
use frontend\models\Universities;
/**
 * This is the model class for table "sotrudnik".
 *
 * @property integer $idSotrudnik
 * @property string $secondName
 * @property string $firstName
 * @property string $midleName
 * @property integer $idCity
 * @property integer $idUniversity
 * @property integer $idFacultet
 * @property string $dolzn
 *
 * @property User $idSotrudnik0
 * @property Cities $idCity0
 * @property Universities $idUniversity0
 * @property Facultet $idFacultet0
 */
class Sotrudnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sotrudnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSotrudnik', 'secondName', 'firstName', 'midleName', 'dolzn'], 'required'],
            [['idSotrudnik', 'idCity', 'idUniversity', 'idFacultet'], 'integer'],
            [['secondName', 'firstName', 'midleName', 'dolzn'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSotrudnik' => 'Id Sotrudnik',
            'secondName' => 'Second Name',
            'firstName' => 'First Name',
            'midleName' => 'Midle Name',
            'idCity' => 'Id City',
            'idUniversity' => 'Id University',
            'idFacultet' => 'Id Facultet',
            'dolzn' => 'Dolzn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSotrudnik0()
    {
        return $this->hasOne(User::className(), ['id' => 'idSotrudnik']);
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
    public function getIdUniversity0()
    {
        return $this->hasOne(Universities::className(), ['id' => 'idUniversity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultet0()
    {
        return $this->hasOne(Facultet::className(), ['id' => 'idFacultet']);
    }
}
