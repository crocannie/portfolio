<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
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

$this->title = 'Анкеты-заявления студентов';
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$anket = urldecode('index.php?r=rating-student/index&id='.$idFacultet); 
?>
<div class="student-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a href=<?=$anket?>>Анкеты-завления студентов</a></li>
                <li><a href=<?=$nir?>>Сроки</a></li>
                <li><a href=<?=$nir?>>Документы</a></li>
            </ul>
        </div>  

        <div class="col-lg-9">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,       
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

<?php
    $active = Value::getActivity($idFacultet);
    foreach ($active as $row ) {
        echo $row['idValue'].' '.$row['id'].' '.$row['value'].'<br>';
        if ($row['id'] == 1) {
            $study = $row['value']*10;
        }
        if ($row['id'] == 2) {
            $science = $row['value'];
        }
        if ($row['id'] == 3) {
            $social = $row['value'];
        }
       if ($row['id'] == 4) {
           $culture = $row['value'];
       }
        if ($row['id'] == 5) {
            $sport = $row['value'];
        }
    }
    echo "<br>".$study;
    echo "<br>".$science;
    echo "<br>".$social;
    echo "<br>".$culture;
    echo "<br>".$sport;
    // echo $studyCnt = (20 * $study) / 100;
?>
