<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sgroup".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idNapravlenie
 *
 * @property Napravlenie $idNapravlenie0
 * @property St[] $sts
 * @property Students[] $students
 * @property Students1[] $students1s
 */
class Sgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'idNapravlenie'], 'required'],
            [['idNapravlenie'], 'integer'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название группы',
            'idNapravlenie' => 'Направление подготовки',
        ];
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
    public function getSts()
    {
        return $this->hasMany(St::className(), ['idGroup' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idGroup' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents1s()
    {
        return $this->hasMany(Students1::className(), ['idGroup' => 'id']);
    }
}
