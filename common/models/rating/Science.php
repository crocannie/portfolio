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
 * This is the model class for table "ratingScience".
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
class Science extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingScience';
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
                                    /***Рейтинг расчет***/
    //Первый критерий
    public function getR1($id){
        $grants = Grants::find()->where(['idStudent'=>$id])->all();
        // $patents = Achievement::getPatent($idStudent);
        $patents = Patents::find()->where(['idStudent'=>$id])->all();
        $R1 = (count($grants)*90) + (count($patents)*80);
        return $R1;
    }

    //Второй критерий
    public function getR2($id){
        $R2 = null;
        $articles = Articles::getType($id);
        for ($i = 0; $i < count($articles); $i++) { 
            $count = $articles[$i]['count'];
            $value = $articles[$i]['value'];
            $R2 += $count*$value;   
        }
        return $R2;
    }

    //Третий критерий
    public function getR3($id){
        $R3 = null;
        $achievement = AchievementsStudy::getValue($id);
        for ($i = 0; $i < count($achievement); $i++){
            $statusEvent = $achievement[$i]['statusEvent'];
            $value = $achievement[$i]['value'];
            $count = count($statusEvent);
            $R3 += $count * $value;
        }
        return $R3;
    }

    //Получить статус заявки
    public function getStatus($id){
        $sql = Yii::$app->db->createCommand('SELECT status as status from ratingScience where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }

    public function getCount($id){
        $sql = Yii::$app->db->createCommand('SELECT count(*) as countS from ratingScience where idStudent = :id')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $sql;
    }
}
