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

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quotas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            'study'=>[
                'header' => 'Учебная',
                'value' => function($model){
                            $activity = Value::getActivity(1);
                            foreach ($activity as $row ) {
                                if ($row['id'] == 1) {
                                    $studyValue = $row['value']*10;
                                }
                            }
                            $studyCnt   = ($model->cnt * $studyValue)      / 100;
                        return $studyCnt;
                        }
            ],
            'science'=>[
                'header' => 'Научно-исследовательская',
                'value' => function($model){
                            $activity = Value::getActivity(1);
                            foreach ($activity as $row ) {
                                if ($row['id'] == 2) {
                                    $scienceValue = $row['value']*10;
                                }
                            }
                            $scienceCnt   = ($model->cnt * $scienceValue)      / 100;
                        return $scienceCnt;
                        }
            ],
            'social'=>[
                'header' => 'Общественная',
                'value' => function($model){
                            $activity = Value::getActivity(1);
                            foreach ($activity as $row ) {
                                if ($row['id'] == 3) {
                                    $socialValue = $row['value']*10;
                                }
                            }
                            $socialCnt   = ($model->cnt * $socialValue)      / 100;
                        return $socialCnt;
                        }
            ],
            'culture'=>[
                'header' => 'Культурно-творческая',
                'value' => function($model){
                            $activity = Value::getActivity(1);
                            foreach ($activity as $row ) {
                                if ($row['id'] == 4) {
                                    $cultureValue = $row['value']*10;
                                }
                            }
                            $cultureCnt   = ($model->cnt * $cultureValue)      / 100;
                        return $cultureCnt;
                        }
            ],
            'sport'=>[
                'header' => 'Спортивная',
                'value' => function($model){
                            $activity = Value::getActivity(1);
                            foreach ($activity as $row ) {
                                if ($row['id'] == 5) {
                                    $sportValue = $row['value']*10;
                                }
                            }
                            $sportCnt   = ($model->cnt * $sportValue)      / 100;
                        return $sportCnt;
                        }
            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
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
