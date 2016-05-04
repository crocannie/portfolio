<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grants".
 *
 * @property integer $id
 * @property string $nameProject
 * @property string $nameOrganization
 * @property string $dateBegin
 * @property string $dateEnd
 * @property string $regNumberCitis
 * @property string $regNumber
 * @property integer $idTypeContest
 * @property integer $idScienceDirection
 * @property integer $idDocument
 * @property integer $idStudent
 *
 * @property TypeContest $idTypeContest0
 * @property ScienceDirection $idScienceDirection0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class Grants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */    
    public $file;

    public static function tableName()
    {
        return 'grants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateBegin', 'dateEnd'], 'safe'],
            [['idTypeContest', 'idScienceDirection', 'idStudent', 'typeGrant', 'idStatus', 'idLevel'], 'integer'],
            [['idStudent', 'idStatus', 'idLevel'], 'required'],
            [['nameProject', 'nameOrganization', 'location'], 'string', 'max' => 512],
            [['regNumberCitis', 'regNumber'], 'string', 'max' => 128],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameProject' => 'Название проекта',
            'nameOrganization' => 'Название фонда',
            'dateBegin' => 'Дата начала проекта',
            'dateEnd' => 'Дата завершения проекта',
            'regNumberCitis' => 'Регистрационный номер ЦИТИС',
            'regNumber' => 'Регистрационный номер',
            'idTypeContest' => 'Вид конкурса',
            'idScienceDirection' => 'Направление науки',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'file' => 'Документ',
            'typeGrant' => 'Участник',
             'idStatus' =>'Статус мероприятия', 
             'idLevel' => 'Уровень мероприятия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypeContest0()
    {
        return $this->hasOne(TypeContest::className(), ['id' => 'idTypeContest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdScienceDirection0()
    {
        return $this->hasOne(ScienceDirection::className(), ['id' => 'idScienceDirection']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocument0()
    {
        return $this->hasOne(Documents::className(), ['id' => 'idDocument']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }
}
