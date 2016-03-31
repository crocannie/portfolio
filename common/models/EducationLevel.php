<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "educationLevel".
 *
 * @property integer $id
 * @property string $name
 *
 * @property St[] $sts
 * @property Students[] $students
 */
class EducationLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'educationLevel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 256]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSts()
    {
        return $this->hasMany(St::className(), ['idLevel' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['idLevel' => 'id']);
    }
}
