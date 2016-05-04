<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use common\models\Sotrudnik;
use common\models\Students;
use kartik\grid\GridView;
use common\models\Sgroup;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\models\Napravlenie;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Группы';
// $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Деканат';

$group = urldecode('index.php?r=sgroup/index&id='.$idFacultet); 
$napravlenie = urldecode('index.php?r=napravlenie/index&id='.$idFacultet); 
$anket = urldecode('index.php?r=rating-student/index&id='.$idFacultet); 
$student = urldecode('index.php?r=student/index&id='.$idFacultet); 
?>
<div class="sgroup-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li><a href=<?=$napravlenie?>></i>Направления подготовки</a></li>
                <li class="active"><a href=<?=$group?>></i>Группы </a></li>
                <li><a href=<?=$student?>></i>Студенты</a></li>
            </ul>
        </div>

        <div class="col-lg-6">
            <h1><?= Html::encode('Группы студентов') ?></h1><br>

            <p><?= Html::button('Добавить группу', ['value'=>Url::to('index.php?r=sgroup/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>       
            <?php
                Modal::begin([
                        'header'=>'<h3>Добавить группу</h3>',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'export' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'name',
                        'header' => 'Название',
                        // 'value' => function($model){
                        //     return $model->name;
                        // }
                     ],
                    'id',
                    // 'name',
                    'idNapravlenie',
                    'idNapravlenie'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Направление подготовки',
                            'value' => function ($model, $index, $widget) {
                                return $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name ;},
                    ],
                    'count'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Количество студентов',
                            'value' => function ($model, $index, $widget) {
                                return count(Students::find()->where(['idGroup'=>$model->id])->all());},
                    ],

                    // ['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn', 
                        'template' => '{delete}',             
                        'contentOptions'=>['style'=>'width: 30px;']
                    ],
                ],
            ]); ?>
         </div>
    </div>
</div>
