<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typeDocument".
 *
 * @property integer $id
 * @property string $name
 * @property integer $value
 *
 * @property Achievements[] $achievements
 * @property AchievementsKTD[] $achievementsKTDs
 * @property AchievementsSport[] $achievementsSports
 * @property PublicPerformance[] $publicPerformances
 */
class TypeDocument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeDocument';
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
    public function getAchievements()
    {
        return $this->hasMany(Achievements::className(), ['idDocumentType' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsKTDs()
    {
        return $this->hasMany(AchievementsKTD::className(), ['idDocumentType' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsSports()
    {
        return $this->hasMany(AchievementsSport::className(), ['idDocumentType' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicPerformances()
    {
        return $this->hasMany(PublicPerformance::className(), ['idDocumentType' => 'id']);
    }
}
