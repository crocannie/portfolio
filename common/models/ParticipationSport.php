<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sportParticipation".
 *
 * @property integer $id
 * @property string $description
 * @property integer $count
 * @property string $date
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class ParticipationSport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'sportParticipation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count', 'idStudent', 'idStatus', 'idLevel', 'idTypeParticipant'], 'integer'],
            [['date', 'idStudent',  'idStatus', 'idLevel', 'idTypeParticipant'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string', 'max' => 1024],
            [['location'], 'string', 'max' => 512],
            [['file'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание',
            'count' => 'Количество мероприятий',
            'date' => 'Дата',
            // 'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'location' => 'Location',
            'file' => 'Документ',
            'idStatus'=>'Статус мероприятия', 
            'idLevel'=> 'Уровень мероприятия', 
            'idTypeParticipant' => 'Участник'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocument0()
    {
        return $this->hasOne(Documents::className(), ['id' => 'idDocument']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }

    public function getAll($id){
        $sql = 'SELECT * as count FROM `sportParticipation` WHERE idStudent = :id AND sportParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
        $ret = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $ret;
    }
}
