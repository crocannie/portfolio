<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Facultet */

$this->title = 'Create Facultet';
$this->params['breadcrumbs'][] = ['label' => 'Facultets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
