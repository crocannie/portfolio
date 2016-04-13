<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Students;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cultures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="culture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Culture', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'status',
            // 'mark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
