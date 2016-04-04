<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sgroup".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idNapravlenie
 *
 * @property Napravlenie $idNapravlenie0
 * @property Students[] $students
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $count; 
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
            [['idNapravlenie', 'count'], 'integer'],
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
            'idNapravlenie' => 'Id Napravlenie',
            'count' =>'count',
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
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idGroup' => 'id']);
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
