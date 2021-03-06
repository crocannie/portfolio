<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typeContest".
 *
 * @property integer $id
 * @property string $name
 * @property integer $value
 *
 * @property Grants[] $grants
 */
class TypeContest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeContest';
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
    public function getGrants()
    {
        return $this->hasMany(Grants::className(), ['idTypeContest' => 'id']);
    }
}
