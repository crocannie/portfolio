<?php

namespace common\models\rating;

use Yii;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsSocial;

/**
 * This is the model class for table "ratingSocial".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property double $r1
 * @property integer $status
 * @property integer $mark
 *
 * @property Students $idStudent0
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingSocial';
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

    public function getR1($id){
        $R1 = null;
        $achievement = AchievementsSocial::getValue($id);
        for ($i = 0; $i < count($achievement); $i++){
            $count = $achievement[$i]['count'];
            $value = $achievement[$i]['value'];
             $R1 += ($count * $value);
        }
        return $R1;
    }

    //Получить статус заявки
    public function getStatus($id){
        $sql = Yii::$app->db->createCommand('SELECT status as status from ratingSocial where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

    public function getCount($id){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from ratingSocial where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }
}
