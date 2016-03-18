<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Учебная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="achievements-study-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
