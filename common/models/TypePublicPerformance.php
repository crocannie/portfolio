<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typePublicPerformance".
 *
 * @property integer $id
 * @property string $name
 * @property integer $value
 *
 * @property PublicPerformance[] $publicPerformances
 */
class TypePublicPerformance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typePublicPerformance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'integer'],
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
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicPerformances()
    {
        return $this->hasMany(PublicPerformance::className(), ['idTypePublicPerformance' => 'id']);
    }
}
