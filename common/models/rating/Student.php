<?php

namespace common\models\rating;

use Yii;
use common\models\Students;
use common\models\Activity;

/**
 * This is the model class for table "studentRating".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property integer $idActivity
 * @property double $r1
 * @property double $r2
 * @property double $r3
 * @property integer $status
 * @property integer $mark
 *
 * @property Students $idStudent0
 * @property Activity $idActivity0
 */
// error_reporting(E_ALL ^ E_STRICT);
error_reporting(E_ERROR);
// error_reporting(E_ALL);
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $cnt;

    public static function tableName()
    {
        return 'studentRating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['idStudent', 'idActivity', 'status', 'mark'], 'required'],
            [['idStudent', 'idActivity', 'status', 'mark', 'cnt', 'idFacultet'], 'integer'],
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
            'idActivity' => 'Id Activity',
            'r1' => 'Рейтинг',
            'r2' => 'R2',
            'r3' => 'R3',
            'status' => 'Status',
            'mark' => 'Доля оценок "отлично"',
            'cnt' => 'Квота'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['idStudent' => 'idStudent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActivity0()
    {
        return $this->hasOne(Activity::className(), ['id' => 'idActivity']);
    }

    //НИД
    public function getCount($id, $acivity){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from studentRating where idStudent = :id and idActivity = :acivity')
                            ->bindValue(':id', $id)
                            ->bindValue(':acivity', $acivity)
                            ->queryAll();
        return $sql;
    }
    public function getStatus($id, $acivity){
        $sql = Yii::$app->db->createCommand('SELECT status as status from studentRating where idStudent = :id and idActivity = :acivity')
                            ->bindValue(':id', $id)
                            ->bindValue(':acivity', $acivity)
                            ->queryAll();
        return $sql;
    }
}
