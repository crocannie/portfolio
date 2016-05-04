<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\grid\ActionColumn; 
use common\models\Students;
use common\models\Sgroup;
use common\models\EducationLevel;
use common\models\Napravlenie;
use common\models\Sotrudnik;
use common\models\rating\Student;
use common\models\rating\Value;
use common\models\Quotas;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotas';
$this->params['breadcrumbs'][] = $this->title;

$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
?>
<div class="quotas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'export' => false,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'idFacultet',
            
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'cnt',
                'header' => 'Всего',
                        // 'value' => function($model){
                        //     return $model->name;
                        // }
            ],
            'study',
            'science',
            'social',
            'culture',
            'sport',
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<p><?= Html::button('Редактировать квоты', ['value'=>Url::to('index.php?r=quotas/update&id='.$idFacultet),'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>       
    <?php
        Modal::begin([
            'header'=>'<h3>Редактирование</h3>',
            'id'=>'modal',
            'size'=>'modal-lg',
            ]);
            echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    <?= GridView::widget([
                'dataProvider' => $dataProvider2,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'idStudent'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'ФИО', 
                            'value' => function ($model, $index, $widget) {
                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                return $model->idStudent0->secondName.' '.$model->idStudent0->firstName.'<br>'.EducationLevel::findOne($model->idStudent0->idLevel)['name'].', '.Sgroup::findOne($model->idStudent0->idGroup)['name'].'<br>'.Napravlenie::findOne($s)['shifr'].' '.Napravlenie::findOne($s)['name'];;},
                    ],
                    // 'r2',
                    'idActivity'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Направление',
                            'value' => function ($model, $index, $widget) {
                                return $model->idActivity0->name ;},
                    ],
                    'r1'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Рейтинг',
                            'value' => function ($model, $index) {
                                return $model->r1 ;},
                    ],
                    // 'r2',
                    // 'r3',
                    // 'status',
                    'mark'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Доля оценок "отлично"',
                            'value' => function ($model, $index) {
                                return $model->mark ;},
                    ],
                    ['class' => ActionColumn::className(),'template'=>'{view}','contentOptions'=>['style'=>'max-width: 25px;']],
                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
</div>
