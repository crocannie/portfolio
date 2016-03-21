<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "patents".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idTypePatent
 * @property string $copyrightHolder
 * @property string $description
 * @property integer $status
 * @property string $dateApp
 * @property string $dateReg
 * @property integer $regNumber
 * @property integer $appNumber
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property TypePatent $idTypePatent0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 * @property StatusPatent $status0
 */
class Patents extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTypePatent', 'status', 'regNumber', 'appNumber', 'idDocument', 'idStudent'], 'integer'],
            [['dateApp', 'dateReg'], 'safe'],
            [['idStudent'], 'required'],
            [['name', 'copyrightHolder', 'location'], 'string', 'max' => 512],
            [['description'], 'string', 'max' => 1024],
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
            'name' => 'Название',
            'idTypePatent' => 'Тип патента',
            'copyrightHolder' => 'Правообладатель',
            'description' => 'Описание',
            'status' => 'Статус',
            'dateApp' => 'Дата подачи заявки',
            'dateReg' => 'Дата регистрации',
            'regNumber' => 'Регистрационный номер',
            'appNumber' => 'Номер заявки',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'location' => 'Location',
            'file' => 'Документ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypePatent0()
    {
        return $this->hasOne(TypePatent::className(), ['id' => 'idTypePatent']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(StatusPatent::className(), ['id' => 'status']);
    }
}
