<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typeParticipant".
 *
 * @property integer $id
 * @property string $name
 *
 * @property KtdParticipation[] $ktdParticipations
 * @property SocialParticipation[] $socialParticipations
 * @property SportParticipation[] $sportParticipations
 */
class TypeParticipant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeParticipant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtdParticipations()
    {
        return $this->hasMany(KtdParticipation::className(), ['idTypeParticipant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialParticipations()
    {
        return $this->hasMany(SocialParticipation::className(), ['idTypeParticipant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportParticipations()
    {
        return $this->hasMany(SportParticipation::className(), ['idTypeParticipant' => 'id']);
    }
}
