<?php

use yii\helpers\Html;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Date */

$this->title = 'Create Date';
$this->params['breadcrumbs'][] = ['label' => 'Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-create">
	<div class="col-lg-3">
	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>
