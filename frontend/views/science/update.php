<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\rating\Science */

$this->title = 'Update Science: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sciences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="science-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
