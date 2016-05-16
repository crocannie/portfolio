<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "date".
 *
 * @property integer $id
 * @property string $from
 * @property string $to
 */
class Date extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'idFacultet'], 'required'],
            [['from', 'to'], 'safe'],
            [['idFacultet'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
        ];
    }
}
