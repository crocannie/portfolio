<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "universities".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idCity
 *
 * @property Facultet[] $facultets
 * @property Students[] $students
 * @property Cities $idCity0
 */
class Universities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'universities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'idCity'], 'required'],
            [['idCity'], 'integer'],
            [['name', 'dekan'], 'string', 'max' => 128]
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
            'idCity' => 'Id City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultets()
    {
        return $this->hasMany(Facultet::className(), ['idUniversity' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idUniversity' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCity0()
    {
        return $this->hasOne(Cities::className(), ['id' => 'idCity']);
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
