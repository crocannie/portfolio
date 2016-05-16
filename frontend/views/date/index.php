<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Date', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from',
            'to',
            'idFacultet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php
echo '<label class="control-label">Сроки подачи заявлений</label>';
echo DatePicker::widget([
    'name' => 'from_date',
    // 'value' => date('d-m-Y'),
    'value' => $model->from,
    'type' => DatePicker::TYPE_RANGE,
    'name2' => 'to_date',
    'value2' => $model->to,
    'separator' => '<i class="glyphicon glyphicon glyphicon-arrow-right"></i>',

    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]);
?>