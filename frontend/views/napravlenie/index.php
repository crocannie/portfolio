<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use common\models\Sotrudnik;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Направления подготовки';
// $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];

$this->params['breadcrumbs'][] = 'Деканат';

$group = urldecode('index.php?r=sgroup/index&id='.$idFacultet); 
$napravlenie = urldecode('index.php?r=napravlenie/index&id='.$idFacultet); 
$students = urldecode('index.php?r=student/index&id='.$idFacultet); 
?>
<div class="napravlenie-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a href=<?=$napravlenie?>></i>Направления подготовки</a></li>
                <li><a href=<?=$group?>></i>Группы </a></li>
                <li><a href=<?=$students?>></i>Студенты</a></li>
            </ul>
        </div>

        <div class="col-lg-6">
            <h1><?= $this->title  ?></h1><br>
            <p><?= Html::button('Добавить направление', ['value'=>Url::to('index.php?r=napravlenie/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>
            <?php
                Modal::begin([
                        'header'=>'<h3>Добавить направление</h3>',
                        'id'=>'modal',
                        'size'=>'modal-lg',
                    ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
            ?>

            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'export' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'shifr',
                        'header' => 'Шифр',
                     ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'name',
                        'header' => 'Название',
                     ],
                    // 'id',
                    // 'shifr',
                    // 'name',
                    // 'idFacultet',

                    // ['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn', 
                        'template' => '{delete}',             
                        'contentOptions'=>['style'=>'width: 30px;']
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
         </div>
    </div>
</div>
