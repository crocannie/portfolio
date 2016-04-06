<?php

use yii\helpers\Html;
use common\models\StatusEvent;
use common\models\EventType;

/* @var $this yii\web\View */
/* @var $model common\models\rating\Rating */

$this->title = 'Update Rating: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rating-update">
    <h1><?= Html::encode("Редактирование") ?></h1>
    
<?php
echo $model->id.' '.$model->idFacultet.' '.$model->idTable.' '.$model->idItem.' '.$model->value.'<br>';
	if($model->idTable == 1){
		$name = StatusEvent::findOne($model->idItem);
		echo $name['name'];
	}
	if($model->idTable == 2){
		$name = EventType::findOne($model->idItem);
	    echo $name['name'];
	}
	echo $model->idTable;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
