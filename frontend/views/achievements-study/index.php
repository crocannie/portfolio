<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учебная деятельность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-study-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'dateEvent',
            'idEventType'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Вид мероприятия',
                    'value' => function ($model, $index, $widget) {
                        return $model->idEventType0->name ;},
            ],
            'idStatus'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Статус мероприятия',
                    'value' => function ($model, $index, $widget) {
                        return $model->idStatus0->name ;},
            ],
            // 'eventTitle',
            // 'idDocumentType',
            // 'idDocument',
            // 'idStudent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
