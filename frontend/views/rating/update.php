<?php

use yii\helpers\Html;
use common\models\StatusEvent;
use common\models\EventType;
use common\models\Sotrudnik;
use common\models\TypeDocument;

/* @var $this yii\web\View */
/* @var $model common\models\rating\Rating */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Редактирование ';

$this->params['breadcrumbs'][] = ['label' => 'Критерии для отбора стипендиатов', 'url' => urldecode('index.php?r=rating/status&id='.$idFacultet)]; 

$this->params['breadcrumbs'][] = 'Редактирование критерия';
?>
 <h2><?= Html::encode($this->title) ?></h2>
	<br>	
<?php
	if($model->idTable == 1){
		$name = StatusEvent::findOne($model->idItem);
		$table = 'Статус мероприятия';
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 2){
		$table = 'Вид мероприятия';
		$name = EventType::findOne($model->idItem);
	    echo $name['name'];
	}
	if($model->idTable == 3){
		$table = 'Награды';
		$name = TypeDocument::findOne($model->idItem);
	    echo $name['name'];
	}
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
