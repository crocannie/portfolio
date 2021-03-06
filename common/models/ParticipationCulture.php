<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ktdParticipation".
 *
 * @property integer $id
 * @property string $description
 * @property integer $count
 * @property string $date
 * @property string $location
 * @property integer $idDocument
 * @property integer $idStudent
 *
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class ParticipationCulture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'ktdParticipation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count', 'idStudent', 'idStatus', 'idLevel', 'idTypeParticipant', 'status'], 'integer'],
            [['date', 'idStudent', 'count', 'idStatus', 'idLevel', 'idTypeParticipant'], 'required'],
            [['date'], 'safe'],
            [['description' , 'message'], 'string', 'max' => 1024],
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
            'location' => 'Location',
            // 'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'file' => 'Документ',
            'idStatus'=>'Статус мероприятия', 
            'idLevel'=> 'Уровень мероприятия', 
                        'status' => 'Статус',
            'message' => 'Причина',
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
    public function getIdStatus0()
    {
        return $this->hasOne(StatusEvent::className(), ['id' => 'idStatus']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }
    public function getIdLevel0()
    {
        return $this->hasOne(EventLevel::className(), ['id' => 'idLevel']);
    }
    public function getIdTypeParticipant0()
    {
        return $this->hasOne(TypeParticipant::className(), ['id' => 'idTypeParticipant']);
    }
    public function getAll($id){
        $sql = 'SELECT * FROM ktdParticipation WHERE idStudent = :id  and ktdParticipation.status = 0 AND ktdParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';        
        $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $ret;
    } 
}
