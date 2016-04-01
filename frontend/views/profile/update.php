<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
$name = ($model->firstName.' '.$model->secondName);
$this->title = 'Редактирование профиля';
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['view', 'id' => $model->idStudent]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
