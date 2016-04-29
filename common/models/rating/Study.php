<?php

namespace common\models\rating;

use Yii;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsStudy;

error_reporting(E_ALL ^ E_STRICT);
error_reporting(E_ERROR);
/**
 * This is the model class for table "ratingStudy".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property double $r1
 * @property integer $status
 * @property integer $mark
 *
 * @property Students $idStudent0
 */
class Study extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingStudy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'r1', 'status', 'mark'], 'required'],
            [['idStudent', 'status', 'mark'], 'integer'],
            [['r1'], 'number']
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
            'r1' => 'R1',
            'status' => 'Status',
            'mark' => 'Mark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }

    //Получить статус заявки
    public function getStatus($id){
        $sql = Yii::$app->db->createCommand('SELECT status as status from ratingStudy where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

    public function getCount($id){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from ratingStudy where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }
/*
select a.dateEvent, s.name as statusEvent, s.value as valueEvent, e.name as eventType, s.value as valueType
from achievements a, statusEvent s, eventType e
where idStudent = :id
and a.idStatus = s.id
and a.idEventType = e.id
and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())

*/
    public function getR1($id){
        $R1 = null;
        $achievement = AchievementsStudy::getValue($id);
        for ($i = 0; $i < count($achievement); $i++){
            $statusEvent = $achievement[$i]['statusEvent'];
            $valueEvent = $achievement[$i]['valueEvent'];

            $eventType = $achievement[$i]['eventType'];
            $valueType = $achievement[$i]['valueType'];

            $event = count($statusEvent);
            $type = count($eventType);

            $R1 += ($event * $valueEvent) + ($type * $valueType);

            // $value = $achievement[$i]['value'];
            // $count = count($statusEvent);
            // $R1 += $count * $value;
        }
        return $R1;
    }
}
