<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "achievementsSport".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idStatus
 * @property integer $idTypeContest
 * @property string $year
 * @property integer $idDocumentType
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property StatusEvent $idStatus0
 * @property EventType $idTypeContest0
 * @property TypeDocument $idDocumentType0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class AchievementsSport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'achievementsSport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStatus', 'idTypeContest', 'idDocumentType', 'idStudent', 'idLevel', 'status'], 'integer'],
            [['year'], 'safe'],
            [['idDocumentType', 'idStudent', 'idTypeContest', 'idDocumentType', 'idLevel'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['location', 'message'], 'string', 'max' => 512],
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
            'name' => 'Название',
            'idStatus' => 'Статус мероприятия',
            'idTypeContest' => 'Вид мероприятия',
            'year' => 'Дата',
            'idDocumentType' => 'Вид полученного документа',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'location' => 'Location',
            'file' => 'Документ',
            'idLevel' => 'Уровень мероприятия',
            'status' => 'Статус',
            'message' => 'Причина',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatus0()
    {
        return $this->hasOne(StatusEvent::className(), ['id' => 'idStatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypeContest0()
    {
        return $this->hasOne(EventType::className(), ['id' => 'idTypeContest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocumentType0()
    {
        return $this->hasOne(TypeDocument::className(), ['id' => 'idDocumentType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocument0()
    {
        return $this->hasOne(Documents::className(), ['id' => 'idDocument']);
    }
    public function getIdLevel0()
    {
        return $this->hasOne(EventLevel::className(), ['id' => 'idLevel']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }

    public function getAll($id){
        $sql = 'SELECT asp.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsSport asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idTypeContest = tc.id and asp.idDocumentTYpe = td.id AND asp.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
        $ret = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $ret;
    }

    public function getStatus($id){
        $sql = 'SELECT se.name as statusEvent, count(*) as count, se.value as value FROM achievementsSport a, statusEvent se WHERE a.idStudent = :id  and a.idStatus = se.id  and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) group by statusEvent';
        $articles = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }

    public function getType($id){
        $sql = 'SELECT a.`name`, a.`id` ,  `idTypeContest` , se.name AS statusEvent, COUNT( * ) AS count, se.value AS value FROM achievementsSport a, eventType se WHERE a.idStudent = :id AND a.idTypeContest = se.id AND a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR ) AND (CURDATE( ))GROUP BY idTypeContest';
        $articles = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }

    public function getDoc($id){
        $sql = 'SELECT a.`name`, a.`id` ,  `idTypeContest` , se.name AS statusEvent, COUNT( * ) AS count, se.value AS value FROM achievementsSport a, typeDocument se  WHERE a.idStudent = :id AND a.idTypeContest = se.id AND a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR ) AND (CURDATE( )) GROUP BY idTypeContest';
        $articles = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }
}
