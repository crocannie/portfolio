<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property integer $idType
 * @property string $name
 * @property integer $year
 * @property integer $idStatus
 * @property integer $idAuthorship
 * @property integer $idDocument
 * @property integer $idStudent
 * @property integer $volumePublication
 *
 * @property TypeArticle $idType0
 * @property StatusEvent $idStatus0
 * @property Authorship $idAuthorship0
 * @property Documents $idDocument0
 * @property Students $idStudent0
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public $file;
    public $statusName;
    public $typeName;

    public function rules()
    {
        return [
            [['idType', 'name', 'year', 'idStatus', 'idAuthorship', 'idStudent', 'volumePublication'], 'required'],
            [['idType', 'year', 'idStatus', 'idAuthorship', 'idDocument', 'idStudent', 'volumePublication'], 'integer'],
            [['file'], 'file'],
            [['location'], 'string', 'max' => 512],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idType' => 'Вид публикации',
            'name' => 'Название',
            'year' => 'Год публикации',
            'idStatus' => 'Статус издания',
            'idAuthorship' => 'Соавторство',
            'idDocument' => 'Документ',
            'idStudent' => 'Id Student',
            'volumePublication' => 'Объем публикации (стр)',
            'file'=>'Документ',
            'statusName'=>'хаха',
            'idType0'=>'dff',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdType0()
    {
        return $this->hasOne(TypeArticle::className(), ['id' => 'idType']);
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
    public function getIdAuthorship0()
    {
        return $this->hasOne(Authorship::className(), ['id' => 'idAuthorship']);
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

    public function getLocation()
    {
        return $this->hasOne(Articles::className(), ['location' => 'location']);
    }

    public function getYearsList() {
        $beginYear = 2000;
        $currentYear =  date("Y");
        $arrYears = array();
        $i = 1;
            while ($beginYear < $currentYear) {
                $arrYears[$i] = $currentYear;
                $currentYear--;
                $i++;

            }
    }
}
