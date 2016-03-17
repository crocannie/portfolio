<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "achievements".
 *
 * @property integer $id
 * @property string $name
 * @property integer $dateEvent
 * @property integer $idEventType
 * @property integer $idStatus
 * @property string $eventTitle
 * @property integer $idDocumentType
 * @property integer $idDocument
 * @property integer $idStudent
 *
 * @property Students $idStudent0
 * @property EventType $idEventType0
 * @property StatusEvent $idStatus0
 * @property TypeDocument $idDocumentType0
 * @property Documents $idDocument0
 */
class AchievementsStudy extends \yii\db\ActiveRecord
{    
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achievements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'dateEvent', 'idEventType', 'idStatus', 'eventTitle', 'idDocumentType', 'idStudent'], 'required'],
            [['dateEvent'], 'safe'],
            [['idEventType', 'idStatus', 'idDocumentType', 'idDocument', 'idStudent'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['eventTitle'], 'string', 'max' => 512],
            [['file'], 'file'],
            [['location'], 'string', 'max' => 512],
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
            'dateEvent' => 'Год проведения мероприятия',
            'idEventType' => 'Вид мероприятия',
            'idStatus' => 'Статус мероприятия',
            'eventTitle' => 'Название мероприятия',
            'idDocumentType' => 'Вид полученного документа',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'file'=>'Документ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'idStudent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEventType0()
    {
        return $this->hasOne(EventType::className(), ['id' => 'idEventType']);
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
}
