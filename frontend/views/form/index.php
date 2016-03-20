<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 
$this->params['breadcrumbs'][] = ['label' => 'Достижения', 'url' => $all];

$this->title = 'Заявления-анкеты';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-index">
    <h2><?= Html::encode('Направления деятельности') ?></h2>
	<?php 
	    $ud = urldecode('index.php?r=form/ud'); 
	    $nid = urldecode('index.php?r=form/nid&id='.Yii::$app->user->identity->id); 
	    $od = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
	    $ktd = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
	    $sd = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 

	?>
    <ul class="nav nav-tabs">
      <li class="active"><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
</div>