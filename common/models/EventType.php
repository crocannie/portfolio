<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "eventType".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Achievements[] $achievements
 * @property AchievementsKTD[] $achievementsKTDs
 * @property AchievementsSport[] $achievementsSports
 */
class EventType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventType';
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
    public function getAchievements()
    {
        return $this->hasMany(Achievements::className(), ['idEventType' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsKTDs()
    {
        return $this->hasMany(AchievementsKTD::className(), ['idTypeContest' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsSports()
    {
        return $this->hasMany(AchievementsSport::className(), ['idTypeContest' => 'id']);
    }
}
