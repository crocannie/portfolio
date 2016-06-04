<?php

namespace common\models;

use common\models\Students;
use Yii;

/**
 * This is the model class for table "achievementsKTD".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idStatus
 * @property integer $idTypeContest
 * @property string $year
 * @property integer $idDocumentType
 * @property integer $idDocument
 * @property integer $idStudent
 *
 * @property StatusEvent $idStatus0
 * @property EventType $idTypeContest0
 * @property TypeDocument $idDocumentType0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class AchievementsCulture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'achievementsKTD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStatus', 'idTypeContest', 'idDocumentType', 'idDocument', 'idStudent', 'idLevel'], 'integer'],
            [['year'], 'safe'],
            [['idDocumentType', 'idStudent', 'idLevel'], 'required'],
            [['name'], 'string', 'max' => 256],
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
            'name' => 'Название',
            'idStatus' => 'Статус мероприятия',
            'idTypeContest' => 'Вид мероприятия',
            'year' => 'Дата',
            'idDocumentType' => 'Вид полученного документа',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'file' => 'Документ',
            'idLevel' => 'Уровень мероприятия'
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
        return $this->hasOne(Students::className(), ['idStudent' => 'idStudent']);
    }

    //Все достижения
    public function getAll($id){
        $sql = 'SELECT a.*, d.name as nameDoc, s.name as status, t.name as type FROM achievementsKTD a, statusEvent s, eventType t, typeDocument d WHERE idStudent = :id and a.`idDocumentType` = d.id and `idStatus` = s.id and `idTypeContest` = t.id and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())';
        $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $ret;
    } 
    public function getType($id){
        // $articles = Yii::$app->db->createCommand('SELECT tA.name as typeArticleName, count(*) as count, tA.value as value FROM articles a, typeArticle tA WHERE a.idStudent = :id and a.idType = tA.id and a.year = between (year(curdate())-2) and (year(curdate())) group by typeArticleName')
        $articles = Yii::$app->db->createCommand('SELECT count( * ) AS count, t.value AS value FROM achievementsKTD a, eventType t WHERE a.idStudent =:id AND a.idTypeContest = t.id AND a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))GROUP BY `idTypeContest` ')
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }

    public function getStatus($id){
        $articles = Yii::$app->db->createCommand('SELECT se.name as statusEvent, count(*) as count, se.value as value FROM achievementsKTD a, statusEvent se WHERE a.idStudent = :id and a.idStatus = se.id and a.year between (year(curdate())-2) and (year(curdate())) group by statusEvent')
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }
}
