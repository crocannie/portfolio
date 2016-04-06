<?php

namespace common\models\rating;

use Yii;
use common\models\Sotrudnik;
 
class Value {
	public function getStatus($id){
		$sql = 'select valuesRating.id as idValue, statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet from statusEvent, valuesRating where valuesRating.idFacultet = :id and statusEvent.id = valuesRating.idItem and valuesRating.idTable = 1';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
		return $status;                             
	}
}