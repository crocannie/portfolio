<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statusPatent".
 *
 * @property integer $id
 * @property string $name
 * @property integer $value
 *
 * @property Patents[] $patents
 */
class StatusPatent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statusPatent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'integer'],
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
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatents()
    {
        return $this->hasMany(Patents::className(), ['status' => 'id']);
    }
}
