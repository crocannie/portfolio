<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 

$this->title = 'Все направления деятельности';

$this->params['breadcrumbs'][] = $this->title;

$ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id); 
?>

<h1><?= Html::encode('Направления деятельности') ?></h1>

<ul class="nav nav-tabs nav-stacked">
    <li><a href=<?=$ur?>></i> Учебная деятельность</a></li>
    <li><a href=<?=$nir?>></i> Научно-исследовательская деятельность</a></li>
    <li><a href=<?=$or?>></i> Общественная деятельность</a></li>
    <li><a href="#"></i> Культурно-творческая деятельность</a></li>
    <li><a href=<?=$or?>></i> Спортивная деятельность</a></li>
</ul>
