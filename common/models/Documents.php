<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property string $userFileName
 * @property string $tmpFileName
 * @property double $size
 * @property string $location
 *
 * @property Achievements[] $achievements
 * @property AchievementsKTD[] $achievementsKTDs
 * @property AchievementsPresident[] $achievementsPresidents
 * @property AchievementsSport[] $achievementsSports
 * @property Articles[] $articles
 * @property Grants[] $grants
 * @property KtdParticipation[] $ktdParticipations
 * @property Patents[] $patents
 * @property PublicPerformance[] $publicPerformances
 * @property SocialParticipation[] $socialParticipations
 * @property SportParticipation[] $sportParticipations
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'userFileName', 'tmpFileName', 'size', 'location'], 'required'],
            [['idStudent'], 'integer'],
            [['size'], 'number'],
            [['userFileName', 'tmpFileName'], 'string', 'max' => 256],
            [['location'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idStudent' => 'Id Student',
            'userFileName' => 'User File Name',
            'tmpFileName' => 'Tmp File Name',
            'size' => 'Size',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievements()
    {
        return $this->hasMany(Achievements::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsKTDs()
    {
        return $this->hasMany(AchievementsKTD::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsPresidents()
    {
        return $this->hasMany(AchievementsPresident::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsSports()
    {
        return $this->hasMany(AchievementsSport::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrants()
    {
        return $this->hasMany(Grants::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtdParticipations()
    {
        return $this->hasMany(KtdParticipation::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatents()
    {
        return $this->hasMany(Patents::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicPerformances()
    {
        return $this->hasMany(PublicPerformance::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialParticipations()
    {
        return $this->hasMany(SocialParticipation::className(), ['idDocument' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportParticipations()
    {
        return $this->hasMany(SportParticipation::className(), ['idDocument' => 'id']);
    }
}
