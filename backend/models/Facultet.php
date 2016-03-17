<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "facultet".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idUniversity
 *
 * @property Universities $idUniversity0
 * @property Napravlenie[] $napravlenies
 * @property Students[] $students
 */
class Facultet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facultet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'idUniversity'], 'required'],
            [['idUniversity'], 'integer'],
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
            'name' => 'Name',
            'idUniversity' => 'Id University',
        ];
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
    public function getNapravlenies()
    {
        return $this->hasMany(Napravlenie::className(), ['idFacultet' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idFacultet' => 'id']);
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
