<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Sotrudnik;

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
$criterii = urldecode('index.php?r=rating/status&id='.$idFacultet); 

//index.php?r=rating/status&id
?>

<h1><?= Html::encode('Деканат') ?></h1>

<ul class="nav nav-tabs nav-stacked" >
    <li><a href=<?=$napravlenie?>></i>Направления подготовки</a></li>
    <li><a href=<?=$group?>></i>Группы студентов</a></li>
    <li><a href=<?=$group?>></i>Заявления студентов</a></li>
    <li><a href=<?=$criterii?>></i>Критерии для отбора стипендиатов</a></li>
</ul>
