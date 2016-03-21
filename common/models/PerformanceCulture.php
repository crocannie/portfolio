<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publicPerformance".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idStatus
 * @property integer $idTypePublicPerformance
 * @property string $year
 * @property integer $idDocumentType
 * @property integer $idDocument
 * @property integer $idStudent
 * @property string $location
 *
 * @property StatusEvent $idStatus0
 * @property TypePublicPerformance $idTypePublicPerformance0
 * @property TypeDocument $idDocumentType0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class PerformanceCulture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'publicPerformance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStatus', 'idTypePublicPerformance', 'idDocumentType', 'idDocument', 'idStudent'], 'integer'],
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
            'name' => 'Описание',
            'idStatus' => 'Статус мероприятия',
            'idTypePublicPerformance' => 'Жанр',
            'year' => 'Дата',
            'idDocumentType' => 'Вид полученного документа',
            'idDocument' => 'Id Document',
            'idStudent' => 'Id Student',
            'location' => 'Location',
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
    public function getIdTypePublicPerformance0()
    {
        return $this->hasOne(TypePublicPerformance::className(), ['id' => 'idTypePublicPerformance']);
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
}
