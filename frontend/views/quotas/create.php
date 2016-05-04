<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Quotas */

$this->title = 'Create Quotas';
$this->params['breadcrumbs'][] = ['label' => 'Quotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
