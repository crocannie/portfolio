<?php

namespace common\models\rating;

use Yii;

use common\models\Students;
use common\models\Universities;
use common\models\AchievementsCulture;

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
            [['idStudent', 'r1', 'r2', 'r3', 'status', 'mark'], 'required'],
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
}
