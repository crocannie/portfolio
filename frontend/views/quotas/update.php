<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Quotas */

$this->title = 'Update Quotas: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
