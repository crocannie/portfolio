<?php

namespace common\models\rating;

use Yii;

use common\models\Students;
use common\models\Universities;
use common\models\AchievementsCulture;
use common\models\PerformanceCulture;
use common\models\ParticipationCulture;
error_reporting(E_ALL ^ E_STRICT);
error_reporting(E_ERROR);
/**
 * This is the model class for table "ratingCulture".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property double $r1
 * @property double $r2
 * @property double $r3
 * @property integer $status
 * @property integer $mark
 *
 * @property Students $idStudent0
 */
class Culture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingCulture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['idStudent', 'r1', 'r2', 'r3', 'status', 'mark'], 'required'],
            [['idStudent', 'status', 'mark'], 'required'],
            [['idStudent', 'status', 'mark'], 'integer'],
            [['r1', 'r2', 'r3'], 'number']
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
            'r2' => 'R2',
            'r3' => 'R3',
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
        $sql = Yii::$app->db->createCommand('SELECT status as status from ratingCulture where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

    public function getCount($id){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from ratingCulture where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }
                                    /***Рейтинг расчет***/
    //Первый критерий
    public function getR1($id){
        // $grants = Grants::find()->where(['idStudent'=>$id])->all();
        // // $patents = Achievement::getPatent($idStudent);
        // $patents = Patents::find()->where(['idStudent'=>$id])->all();
        // $R1 = (count($grants)*90) + (count($patents)*80);
        // return $R1;

        $R1 = null;
        $achievement = AchievementsCulture::getType($id);
        for ($i = 0; $i < count($achievement); $i++){
            $count = $achievement[$i]['count'];
            $value = $achievement[$i]['value'];
            $R1 += $count * $value;
        }
        return $R1;
    }

    //Второй критерий
    public function getR2($id){
        $R2 = null;
        $type = PerformanceCulture::getType($id);
        $status = PerformanceCulture::getStatus($id);
        $doc = PerformanceCulture::getDoc($id);
        
        for ($i = 0; $i < count($type); $i++) { 
            $countType = $type[$i]['count'];
            $valueType = $type[$i]['value'];
            $sumType = $countType * $valueType;
            // echo "Type: ".$countType." : ".$valueType."<br>";
        }
        // echo $sumType."<br>";

        for ($i = 0; $i < count($status); $i++) { 
            $countStatus = $status[$i]['count'];
            $valueStatus = $status[$i]['value'];
            $sumStatus = $countStatus * $valueStatus;
            // echo "Status: ".$name." : ".$countStatus." : ".$valueStatus."<br>";
        }
        // echo $sumStatus."<br>";

        for ($i = 0; $i < count($doc); $i++) { 
            $countDoc = $doc[$i]['count'];
            $valueDoc = $doc[$i]['value'];
            $sumDoc = $countDoc * $valueDoc;
            // echo "Doc: ".$countDoc." : ".$valueDoc."<br>";
        }
        // echo $sumDoc."<br>";

        $R2 += $sumStatus + $sumType + $sumDoc;
        // echo $R2;
        return $R2;
    }

    //Третий критерий
    public function getR3($id){
        $R3 = null;
        $achievement = ParticipationCulture::getAll($id);
        for ($i = 0; $i < count($achievement); $i++){
            $count = $achievement[$i]['count'];
            $value =10;
            $R3 += $count * $value;
        }
        return $R3;
    }
}
