<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Sotrudnik;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgroup-index">

    <h3><?= Html::encode('Факультет: '.$sotrudnik->idFacultet0->name) ?></h3>

    <p>
        <?= Html::a('Добавить группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'idNapravlenie'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Направление подготовки',
                    'value' => function ($model, $index, $widget) {
                        return $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name ;},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
