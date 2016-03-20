<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSport */
$all = urldecode('index.php?r=site/activities'); 
$sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Спортивная деятельность', 'url' => $sr];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="achievements-sport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
