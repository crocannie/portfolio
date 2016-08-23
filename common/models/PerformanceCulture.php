<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publicPerformance".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idStatus
 * @property integer $idTypePublicPerformance
 * @property string $year
 * @property integer $idDocumentType
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property StatusEvent $idStatus0
 * @property TypePublicPerformance $idTypePublicPerformance0
 * @property TypeDocument $idDocumentType0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class PerformanceCulture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'publicPerformance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStatus', 'idTypePublicPerformance', 'idDocumentType', 'idStudent', 'idLevel', 'status'], 'integer'],
            [['year'], 'safe'],
            [['idDocumentType', 'idStudent', 'idLevel', 'idTypePublicPerformance', 'idDocumentType'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['location'], 'string', 'max' => 512],
            [['message'], 'string', 'max' => 512],
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
            'name' => 'Описание',
            'idStatus' => 'Статус мероприятия',
            'idTypePublicPerformance' => 'Жанр',
            'year' => 'Дата',
            'idDocumentType' => 'Вид полученного документа',
            'idStudent' => 'Id Student',
            'location' => 'Location',
            'file' => 'Документ',
                        'status' => 'Статус',
            'message' => 'Причина',
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
    public function getIdTypePublicPerformance0()
    {
        return $this->hasOne(TypePublicPerformance::className(), ['id' => 'idTypePublicPerformance']);
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
        $sql = 'select pp.*, st.name as status, tpp.name as type, td.name as documentType from publicPerformance pp, statusEvent st, typePublicPerformance tpp, typeDocument td where idStudent = :id and pp.idStatus = st.id and pp.idTypePublicPerformance = tpp.id and pp.idDocumentType = td.id and pp.status = 0 AND pp.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';        
        $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $ret;
    } 

    public function getType($id){
        // $articles = Yii::$app->db->createCommand('SELECT tA.name as typeArticleName, count(*) as count, tA.value as value FROM articles a, typeArticle tA WHERE a.idStudent = :id and a.idType = tA.id and a.year = between (year(curdate())-2) and (year(curdate())) group by typeArticleName')
        $articles = Yii::$app->db->createCommand('select count(*) as count, t.value as value from publicPerformance p, typePublicPerformance t where p.idStudent = :id and a.status = 0 and p.idTypePublicPerformance = t.id AND p.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( )) GROUP BY `idTypePublicPerformance` ')
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }

    public function getStatus($id){
        $articles = Yii::$app->db->createCommand('select count(*) as count, e.value as value, e.name as name from publicPerformance p, statusEvent e where p.idStudent = :id and a.status = 0 and p.idStatus = e.id AND p.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( )) GROUP BY `idStatus` ')
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }

    public function getDoc($id){
        $articles = Yii::$app->db->createCommand('select count(*) as count, t.value as value from publicPerformance p, typeDocument t where p.idStudent = :id and p.idDocumentType = t.id and a.status = 0 AND p.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( )) GROUP BY `idDocumentType` ')
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $articles;
    }


}
