<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "napravlenie".
 *
 * @property integer $id
 * @property string $shifr
 * @property string $name
 * @property integer $idFacultet
 *
 * @property Facultet $idFacultet0
 * @property Sgroup[] $sgroups
 * @property Students[] $students
 */
class Napravlenie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'napravlenie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shifr', 'name', 'idFacultet'], 'required'],
            [['idFacultet'], 'integer'],
            [['shifr', 'name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shifr' => 'Shifr',
            'name' => 'Name',
            'idFacultet' => 'Id Facultet',
        ];
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
    public function getSgroups()
    {
        return $this->hasMany(Sgroup::className(), ['idNapravlenie' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idNapravlenie' => 'id']);
    }

    public static function dropdown()
    {
        static $dropdown;
        if ($dropdown === null){
            $models = static::find()->all();
            foreach($models as $row){
                $dropdown [$row->id] = $row->name;
            }
        }
        return $dropdown;
    }
}
