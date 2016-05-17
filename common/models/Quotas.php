<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotas".
 *
 * @property integer $id
 * @property integer $idFacultet
 * @property integer $cnt
 */
class Quotas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    // public $study;
    // public $science;
    // public $social;
    // public $culture;
    // public $sport;

    public static function tableName()
    {
        return 'quotas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idFacultet', 'cnt'], 'required'],
            [['id', 'idFacultet', 'cnt', 'study', 'science', 'social', 'culture', 'sport'], 'integer']
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
            'cnt' => 'Всего',
        
            'study'=> 'Учебная', 
            'science'=> 'Научно-исследовательская', 
            'social'=> 'Общественная', 
            'culture'=> 'Культурно-творческая', 
            'sport'=>'Спортивная',
        ];
    }
}
