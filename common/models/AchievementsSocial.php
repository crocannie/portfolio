<?php
namespace common\models;
use Yii;
/**
 * This is the model class for table "socialParticipation".
 *
 * @property integer $id
 * @property integer $idSocialParticipationType
 * @property string $description
 * @property integer $count
 * @property string $date
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class AchievementsSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'socialParticipation';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSocialParticipationType', 'count', 'idStudent', 'idStatus', 'idLevel', 'idTypeParticipant', 'status'], 'integer'],
            [['date', 'idStudent',  'idStatus', 'idLevel', 'idTypeParticipant', 'idSocialParticipationType', 'count'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string', 'max' => 1024],
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
            'idSocialParticipationType' => 'Вид участия',
            'description' => 'Описание',
            'count' => 'Количество участий',
            'date' => 'Дата',
            // 'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'location' => 'Location',
            'file' => 'Документ',
            'idStatus'=>'Статус мероприятия', 
            'idLevel'=> 'Уровень мероприятия', 
            'idTypeParticipant' => 'Участник',
            'status' => 'Статус',
            'message' => 'Причина'
        ];
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
    public function getIdSocialParticipationType0()
    {
        return $this->hasOne(TypeSocialParticipation::className(), ['id' => 'idSocialParticipationType']);
    }

    public function getIdLevel0()
    {
        return $this->hasOne(EventLevel::className(), ['id' => 'idLevel']);
    }

    public function getIdStatus0()
    {
        return $this->hasOne(StatusEvent::className(), ['id' => 'idStatus']);
    }

    public function getIdTypeParticipant0()
    {
        return $this->hasOne(TypeParticipant::className(), ['id' => 'idTypeParticipant']);
    }
    //idTypeParticipant

    public function getValue($id){
        $ret = Yii::$app->db->createCommand('select s.count as count, t.value as value from socialParticipation s, typeSocialParticipation t where idStudent = :id  and s.idSocialParticipationType = t.id and s.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':id', $id)
                            ->queryAll();
        return $ret;
    } 

    //Все достижения
    public function getAll($id){
        $sql = 'SELECT * FROM `ktdParticipation` WHERE idStudent = :id';
        $ret = Yii::$app->db->createCommand('$sql')
                            ->bindValue(':id', Yii::$app->user->identity->id)
                            ->queryAll();
        return $ret;
    }    
}