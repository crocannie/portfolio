<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Date */

$this->title = 'Update Date: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="date-update">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
</div>
