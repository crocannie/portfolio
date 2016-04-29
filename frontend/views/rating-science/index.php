<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sciences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="science-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Science', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idStudent',
            'r1',
            'r2',
            'r3',
            'mark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
