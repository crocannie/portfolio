<?php

namespace common\models;

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
            [['idStatus', 'idTypeContest', 'idDocumentType', 'idDocument', 'idStudent'], 'integer'],
            [['year'], 'safe'],
            [['idDocumentType', 'idStudent'], 'required'],
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
            'file' => 'Документ'
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }

    //Все достижения
    public function getAll($id){
        $sql = 'SELECT * FROM `ktdParticipation` WHERE idStudent = :id and ktdParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())';
        $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $ret;
    } 
}
