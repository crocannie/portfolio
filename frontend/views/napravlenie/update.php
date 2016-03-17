<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */

$this->title = 'Update Napravlenie: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Napravlenies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="napravlenie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
