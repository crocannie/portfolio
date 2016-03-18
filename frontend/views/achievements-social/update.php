<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSocial */
$all = urldecode('index.php?r=site/activities'); 
$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Редактирование: ' . ' ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Общественная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="achievements-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
