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
use yii\helpers\Json;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotas';
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
<div class="rating-index">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4">
                <h1><?= Html::encode($this->title) ?></h1>
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
                <p><?= Html::button('Редактировать квоты', ['value'=>Url::to('index.php?r=quotas/update&id='.$idFacultet),'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>        
                <p><?= Html::button('Рассчитать квоты', ['value'=>Url::to('index.php?r=quotas/update&id='.$idFacultet),'class' => 'btn btn-success', 'id'=>'modalButton']) ?></p>        

            </div>
        </div>
        <?php
            Modal::begin([
                'header'=>'<h3>Редактирование</h3>',
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
</div>
