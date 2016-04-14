<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Sotrudnik;
use common\models\rating\Rating;
use common\models\EventType;
use common\models\StatusEvent;
use common\models\TypeDocument;
use common\models\rating\Value;
use common\models\Students;

error_reporting(E_ALL ^ E_STRICT);
error_reporting(E_ERROR);
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$form = urldecode('index.php?r=rating-study/create'); 

$this->title = 'Деканат';

$this->params['breadcrumbs'][] = $this->title;

$group = urldecode('index.php?r=sgroup/index&id='.$idFacultet); 
$napravlenie = urldecode('index.php?r=napravlenie/index&id='.$idFacultet); 
$anket = urldecode('index.php?r=rating-student/index&id='.$idFacultet); 
$criterii = urldecode('index.php?r=rating/status&id='.$idFacultet); 

//index.php?r=rating/status&id
?>

<h1><?= Html::encode('Деканат') ?></h1>
<div class="rating-index">
	<div class="row">
		<ul class="nav nav-tabs nav-stacked">
		    <li><a href=<?=$napravlenie?>></i>Направления подготовки</a></li>
		    <li><a href=<?=$group?>></i>Группы студентов</a></li>
		    <li><a href=<?=$anket?>></i>Заявления-анкеты</a></li>
		    <li><a href=<?=$criterii?>></i>Критерии для отбора стипендиатов</a></li>
		</ul>
	</div>
</div>