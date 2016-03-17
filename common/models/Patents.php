<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "patents".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idTypePatent
 * @property integer $status
 * @property string $copyrightHolder
 * @property string $description
 * @property string $dateApp
 * @property string $dateReg
 * @property integer $regNumber
 * @property integer $appNumber
 * @property integer $idDocument
 * @property integer $idStudent
 *
 * @property TypePatent $idTypePatent0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class Patents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
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
            [['idDocument', 'idStudent'], 'required'],
            [['name', 'copyrightHolder'], 'string', 'max' => 512],
            [['description'], 'string', 'max' => 1024],
            [['file'], 'file']
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
            'idTypePatent' => 'Тип',
            'status' => 'Статус',
            'copyrightHolder' => 'Правообладатель',
            'description' => 'Описание',
            'dateApp' => 'Дата поступления заявки',
            'dateReg' => 'Дата регистрации',
            'regNumber' => 'Регистрационный номер',
            'appNumber' => 'Номер заявки',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'file' => 'Документ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getStatus0()
    {
        return $this->hasOne(StatusPatent::className(), ['id' => 'status']);
    }
    
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
}
