<?php

use yii\helpers\Html;
use common\models\StatusEvent;
use common\models\EventType;
use common\models\Sotrudnik;
use common\models\TypeDocument;
use common\models\TypeArticle;
use common\models\ScienceDirection;
use common\models\TypePatent;
use common\models\TypeContest;
use common\models\Authorship;
use common\models\EducationLevel;
use common\models\StatusPatent;
use common\models\Activity;
use common\models\EventLevel;

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
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 3){
		$table = 'Награды';
		$name = TypeDocument::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 4){
		$table = 'Виды публикаций';
		$name = TypeArticle::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 5){
		$table = 'Направления науки';
		$name = ScienceDirection::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 6){
		$table = 'Патенты';
		$name = TypePatent::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 7){
		$table = 'Виды конкурсов';
		$name = TypeContest::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 8){
		$table = 'Коэффициент студента';
		$name = EducationLevel::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 9){
		$table = 'Соавторство';
		$name = Authorship::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 10){
		$table = 'Статус патента';
		$name = StatusPatent::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 11){
		$table = 'Направления деятельности';
		$name = Activity::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
	if($model->idTable == 12){
		$table = 'Уровень мероприятия';
		$name = EventLevel::findOne($model->idItem);
		echo '<h3>'.$table.': <br>'.$name['name'].'</h3>';
	}
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
