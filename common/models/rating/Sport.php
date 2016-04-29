<?php

namespace common\models\rating;

use Yii;
use common\models\AchievementsSport;
use common\models\ParticipationSport;

/**
 * This is the model class for table "ratingSport".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property double $r1
 * @property double $r2
 * @property integer $status
 * @property integer $mark
 *
 * @property Students $idStudent0
 */
class Sport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingSport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'r1', 'r2', 'status', 'mark'], 'required'],
            [['idStudent', 'status', 'mark'], 'integer'],
            [['r1', 'r2'], 'number']
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
        $sql = Yii::$app->db->createCommand('SELECT status as status from ratingSport where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

    public function getCount($id){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from ratingSport where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

                                        /***Рейтинг расчет***/
    //Первый критерий
    public function getR1($id){
        $R1 = null;
        $type = AchievementsSport::getType($id);
        for ($i = 0; $i < count($type); $i++){
            $count = $type[$i]['count'];
            $value = $type[$i]['value'];
            $R1 += $count * $value;
        }

        $status = AchievementsSport::getStatus($id);
        for ($i = 0; $i < count($status); $i++){
            $count = $status[$i]['count'];
            $value = $status[$i]['value'];
            $R1 += $count * $value;
        }

        $doc = AchievementsSport::getDoc($id);
        for ($i = 0; $i < count($doc); $i++){
            $count = $doc[$i]['count'];
            $value = $doc[$i]['value'];
            $R1 += $count * $value;
        }
        return $R1;
    }

    public function getR2($id){
        $R2 = null;
        $achievement = ParticipationSport::getAll($id);
        for ($i = 0; $i < count($achievement); $i++){
            $count = $achievement[$i]['count'];
            $value =10;
            $R2 += $count * $value;
        }
        return $R2;
    }
}
