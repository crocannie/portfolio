<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */

$this->title = 'Create Napravlenie';
$this->params['breadcrumbs'][] = ['label' => 'Napravlenies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="napravlenie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
