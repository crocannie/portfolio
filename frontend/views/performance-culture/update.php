<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerformanceCulture */
$all = urldecode('index.php?r=site/activities'); 
$kr = urldecode('index.php?r=performance-culture/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Культурно-творческая деятельность', 'url' => $kr];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="performance-culture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
