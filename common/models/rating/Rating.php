<?php

namespace common\models\rating;

use Yii;
use common\models\Sotrudnik;

/**
 * This is the model class for table "valuesRating".
 *
 * @property integer $id
 * @property integer $idFacultet
 * @property integer $idTable
 * @property integer $idItem
 * @property integer $value
 *
 * @property Facultet $idFacultet0
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $name;
    public static function tableName()
    {
        return 'valuesRating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFacultet', 'idTable', 'idItem'], 'required'],            
            [['name'], 'string', 'max' => 255],
            [['idFacultet', 'idTable', 'idItem'], 'integer'],
            ['value', 'number', 'max' => 10, 'min' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idFacultet' => 'Id Facultet',
            'idTable' => 'Id Table',
            'idItem' => 'Id Item',
            'value' => 'Значение',
            'name' =>  'Название'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultet0()
    {
        return $this->hasOne(Facultet::className(), ['id' => 'idFacultet']);
    }
}
