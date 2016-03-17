<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
$name = (Yii::$app->user->identity->firstName.' '.Yii::$app->user->identity->secondName);
$this->title = 'Редактирование профиля';
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
