<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\ParticipationSport;
use common\models\rating\Value;
error_reporting( E_STRICT);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$form = urldecode('index.php?r=rating-study/create'); 

$this->title = 'Достижения';

$this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = ['label' => 'Заявления-анкеты', 'url' => $form];

$ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id); 
$kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
$sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id);

?>

<h1><?= Html::encode('Направления деятельности') ?></h1>

<ul class="nav nav-tabs nav-stacked">
    <li><a href=<?=$ur?>></i> Учебная деятельность</a></li>
    <li><a href=<?=$nir?>></i> Научно-исследовательская деятельность</a></li>
    <li><a href=<?=$or?>></i> Общественная деятельность</a></li>
    <li><a href=<?=$kr?>></i> Культурно-творческая деятельность</a></li>
    <li><a href=<?=$sr?>></i> Спортивная деятельность</a></li>
</ul>
