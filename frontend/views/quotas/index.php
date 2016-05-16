<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;

// use \kartik\detail\DetailView;
// use yii\widgets\DetailView;

// use yii\grid\ActionColumn; 
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
use yii\helpers\Json;
<<<<<<< HEAD
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
=======
use yii\widgets\DetailView;
>>>>>>> 6710b079b6990c20bea68b7aeb272f65bfed40a4

use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

<<<<<<< HEAD
$this->title = 'Распеределение стипенедиального обеспечения';
=======
$this->title = 'Распеределение квот';
>>>>>>> 6710b079b6990c20bea68b7aeb272f65bfed40a4
$this->params['breadcrumbs'][] = $this->title;

$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
?>
<div class="quotas-index">
<?php
// $olo = Student::find()->where(['idFacultet'=>1])->limit(5)->all();
// echo count($olo);
?>
<<<<<<< HEAD
    <h2><?= Html::encode($this->title) ?></h2>
    <div class="col-lg-1 col-lg-offset-11">
<?php
echo Html::a('<i class="glyphicon glyphicon-print"></i>', ['/quotas/mpdf'], [
    'class'=>'btn btn-', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Распечатать итоговый список'
]);
// echo "<br>";echo "<br>";
// echo Html::a('<i class="glyphicon glyphicon glyphicon-save-file"></i> View', ['/quotas/viewpdf&id='.$idFacultet], [
//     'class'=>'btn btn-success', 
//     'target'=>'_blank', 
//     'data-toggle'=>'tooltip', 
//     'title'=>''
// ]);
?>    
</div>
    <div class="col-lg-12">  
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
                'header' => 'Всего'
            ],
            // 'study',
            [
                'attribute'=>'study',
                'label'=>'Учебная'
            ],
            [
                'attribute'=>'science',
                'label'=>'Научно-исследовательская'
            ],
            [
                'attribute'=>'social',
                'label'=>'Общественная'
            ],
            [
                'attribute'=>'culture',
                'label'=>'Культурно-творческая'
            ],
            [
                'attribute'=>'sport',
                'label'=>'Спортивная'
            ]
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php
        Modal::begin([
            'header'=>'<h3>Редактирование</h3>',
            'id'=>'modal',
            'size'=>'modal-lg',
            ]);
            echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
    <h2><?= Html::encode('Учебная деятельность (отобранные)') ?></h2>
    <?= GridView::widget([
                'dataProvider' => $dataProvider01,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'Fio',
                        'label'=>'ФИО'
                    ],
                    [
                        'attribute'=>'study',
                        'label'=>'Группа'
                    ],
                    [
                        'attribute'=>'napravlenie',
                        'label'=>'Направление подготовки'
                    ],
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],
                ],
            ]); ?>

    <h2><?= Html::encode('Научно-исследовательская деятельность (отобранные)') ?></h2>
    <?= GridView::widget([
                'dataProvider' => $dataProvider02,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'Fio',
                        'label'=>'ФИО'
                    ],
                    [
                        'attribute'=>'study',
                        'label'=>'Группа'
                    ],
                    [
                        'attribute'=>'napravlenie',
                        'label'=>'Направление подготовки'
                    ],
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],
                ],
            ]); ?>

    <h2><?= Html::encode('Общественная деятельность (отобранные)') ?></h2>
    <?= GridView::widget([
                'dataProvider' => $dataProvider03,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'Fio',
                        'label'=>'ФИО'
                    ],
                    [
                        'attribute'=>'study',
                        'label'=>'Группа'
                    ],
                    [
                        'attribute'=>'napravlenie',
                        'label'=>'Направление подготовки'
                    ],
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],
                ],
            ]); ?>
    
    <h2><?= Html::encode('Культурно-творческая деятельность (отобранные)') ?></h2>
    <?= GridView::widget([
                'dataProvider' => $dataProvider04,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'Fio',
                        'label'=>'ФИО'
                    ],
                    [
                        'attribute'=>'study',
                        'label'=>'Группа'
                    ],
                    [
                        'attribute'=>'napravlenie',
                        'label'=>'Направление подготовки'
                    ],
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],
                ],
            ]); ?>

    <h2><?= Html::encode('Спортивная деятельность (отобранные)') ?></h2>
    <?= GridView::widget([
                'dataProvider' => $dataProvider05,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'Fio',
                        'label'=>'ФИО'
                    ],
                    [
                        'attribute'=>'study',
                        'label'=>'Группа'
                    ],
                    [
                        'attribute'=>'napravlenie',
                        'label'=>'Направление подготовки'
                    ],
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],
                ],
            ]); ?>

    <h2><?= Html::encode('Все заявления') ?></h2>
            <?= GridView::widget([
                'dataProvider' => $dataProvider2,       
                'pjax' => true,
                'export' => false,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],
=======
<div class="rating-index">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-9">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-lg-4">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        // 'idFacultet',
                        'cnt',
                        'study',
                        'science',
                        'social',
                        'culture',
                        'sport',
                    ],
                ]) ?>
   

            </div>
            <div class="col-lg-4">
                <p><?= Html::button('Редактировать квоты', ['value'=>Url::to('index.php?r=quotas/update&id='.$idFacultet), 'style'=>"width: 200px",'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>        
                <p><?= Html::button('Все анкеты', ['value'=>Url::to('index.php?r=quotas/update&id='.$idFacultet), 'style'=>"width: 200px",'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>     
            </div>    
        </div>

        <?php
            Modal::begin([
                'header'=>'<h3>Редактирование квот</h3>',
                'id'=>'modal',
                'size'=>'modal-lg',
                ]);
                echo "<div id='modalContent'></div>";
            Modal::end();
        ?>
        
        <h2><?= Html::encode('Все заявления') ?></h2>
        <?= GridView::widget([
                    'dataProvider' => $dataProvider2,       
                    'pjax' => true,
                    'export' => false,
                    'tableOptions' => [
                        'class' => 'table table-bordered'
                    ],

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
>>>>>>> 6710b079b6990c20bea68b7aeb272f65bfed40a4

                        // 'id',

<<<<<<< HEAD
                    // 'id',
                    'idStudent'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'ФИО', 
                            'value' => function ($model, $index, $widget) {
                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                return $model->idStudent0->secondName.' '.$model->idStudent0->firstName;},
                    ],
                    'r2'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Группа', 
                            'value' => function ($model, $index, $widget) {
                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                return EducationLevel::findOne($model->idStudent0->idLevel)['name'].', '.Sgroup::findOne($model->idStudent0->idGroup)['name'];},
                    ],
                    [
                            'attribute'=>'r3',
                            'label'=>'Направление подготовки', 
                            'value' => function ($model, $index, $widget) {
                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                return Napravlenie::findOne($s)['shifr'].' '.Napravlenie::findOne($s)['name'];;},
                    ],
                    [
                        'attribute'=>'idActivity',
                        'label'=>'Направление деятельности',
                        'value' => function ($model, $index, $widget) {
                                return $model->idActivity0->name ;},
                    ],
                    [
                        'attribute'=>'mark',
                        'label'=>'Доля оценок "отлично"'
                    ],        
                    [
                        'attribute'=>'r1',
                        'label'=>'Рейтинг'
                    ],
                    // [
                    //         'class' => ActionColumn::className(),
                    //         'deleteOptions' => [
                    //             'label' => '<i class="glyphicon glyphicon-remove"></i>'
                    //         ]
                    // ],
        
                    ['class' => ActionColumn::className(),'template'=>'{view}','contentOptions'=>['style'=>'max-width: 25px;']],
                ],
            ]); 

            ?>
            
            <?php
            $this->registerJs('
                var gridview_id = ""; // specific gridview
                var columns = [2]; // index column that will grouping, start 1
         
                /*
                DON\'T EDIT HERE
         
        http://www.hafidmukhlasin.com
         
                */
                var column_data = [];
                    column_start = [];
                    rowspan = [];
         
                for (var i = 0; i < columns.length; i++) {
                    column = columns[i];
                    column_data[column] = "";
                    column_start[column] = null;
                    rowspan[column] = 1;
                }
         
                var row = 1;
                $(gridview_id+" table > tbody  > tr").each(function() {
                    var col = 1;
                    $(this).find("td").each(function(){
                        for (var i = 0; i < columns.length; i++) {
                            if(col==columns[i]){
                                if(column_data[columns[i]] == $(this).html()){
                                    $(this).remove();
                                    rowspan[columns[i]]++;
                                    $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                                }
                                else{
                                    column_data[columns[i]] = $(this).html();
                                    rowspan[columns[i]] = 1;
                                    column_start[columns[i]] = $(this);
                                }
                            }
                        }
                        col++;
                    })
                    row++;
                });


                (function() {
                    var elements = document.getElementsByClassName("kv-editable-submit");
                    if (elements.length === 0) {
                        return ;
                    }
                    var button = elements[0];
                    var dialog = button;
                    while (dialog && !dialog.classList.contains("kv-editable-popover")) {
                        dialog = dialog.parentNode;
                    }
                    button.addEventListener("click", function() {
                        var runs = 0;
                        var callback = function() {
                            if (dialog.style.display === "none") {
                                location.reload();
                                return ;
                            }
                            if (runs < 5) {
                                ++runs;
                                setTimeout(callback, 500);    
                            }
                        };
                        setTimeout(callback, 500);
                    });
                })();
            ');
            ?>
        </div>
=======
                        'idStudent'=>[
                                'class' => \yii\grid\DataColumn::className(),
                                'format' => 'html',
                                'label'=>'ФИО', 
                                'value' => function ($model, $index, $widget) {
                                    $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                    return $model->idStudent0->secondName.' '.$model->idStudent0->firstName.'<br>'.EducationLevel::findOne($model->idStudent0->idLevel)['name'].', '.Sgroup::findOne($model->idStudent0->idGroup)['name'].'<br>'.Napravlenie::findOne($s)['shifr'].' '.Napravlenie::findOne($s)['name'];;},
                        ],
                        // 'r2',

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
                <?php
                $this->registerJs('
                    var gridview_id = ""; // specific gridview
                    var columns = [2]; // index column that will grouping, start 1
             
                    /*
                    DON\'T EDIT HERE
             
            http://www.hafidmukhlasin.com
             
                    */
                    var column_data = [];
                        column_start = [];
                        rowspan = [];
             
                    for (var i = 0; i < columns.length; i++) {
                        column = columns[i];
                        column_data[column] = "";
                        column_start[column] = null;
                        rowspan[column] = 1;
                    }
             
                    var row = 1;
                    $(gridview_id+" table > tbody  > tr").each(function() {
                        var col = 1;
                        $(this).find("td").each(function(){
                            for (var i = 0; i < columns.length; i++) {
                                if(col==columns[i]){
                                    if(column_data[columns[i]] == $(this).html()){
                                        $(this).remove();
                                        rowspan[columns[i]]++;
                                        $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                                    }
                                    else{
                                        column_data[columns[i]] = $(this).html();
                                        rowspan[columns[i]] = 1;
                                        column_start[columns[i]] = $(this);
                                    }
                                }
                            }
                            col++;
                        })
                        row++;
                    });
                ');
                ?>
    </div>
>>>>>>> 6710b079b6990c20bea68b7aeb272f65bfed40a4
</div>
