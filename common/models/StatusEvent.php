<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statusEvent".
 *
 * @property integer $id
 * @property string $name
 * @property integer $value
 *
 * @property Achievements[] $achievements
 * @property AchievementsKTD[] $achievementsKTDs
 * @property AchievementsSport[] $achievementsSports
 * @property Articles[] $articles
 * @property PublicPerformance[] $publicPerformances
 */
class StatusEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statusEvent';
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
        return $this->hasMany(Achievements::className(), ['idStatus' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsKTDs()
    {
        return $this->hasMany(AchievementsKTD::className(), ['idStatus' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsSports()
    {
        return $this->hasMany(AchievementsSport::className(), ['idStatus' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['idStatus' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicPerformances()
    {
        return $this->hasMany(PublicPerformance::className(), ['idStatus' => 'id']);
    }
}
