<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Napravlenies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="napravlenie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Napravlenie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shifr',
            'name',
            'idFacultet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
