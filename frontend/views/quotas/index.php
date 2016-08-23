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
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\AchievementsStudy;
use yii\web\Session;
// use common\models\Sotrudnik;
  if ((Yii::$app->user->isGuest)){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Распределение стипендиального обеспечения';
$this->params['breadcrumbs'][] = $this->title;

  if (User::isStudent(Yii::$app->user->identity->email)){
    $id = Yii::$app->user->identity->id;
    $st = Students::findOne($id);
    $idFacultet = $st->idFacultet0->id;
  }
  if (User::isSotrudnik(Yii::$app->user->identity->email)){
    $id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $idUniversity = $sotrudnik->idUniversity0->id;
}

Quotas::find()->where(['idFacultet'=>$id]);
$q = (Quotas::find()->where(['idFacultet'=>$idFacultet])->all());
foreach ($q as $row) {
    $study = $row['study'];
    $science = $row['science'];
    $social = $row['social'];
    $culture = $row['culture'];
    $sport = $row['sport'];
}
$status = urldecode('index.php?r=quotas/index&id='.$idFacultet); 
// echo         $q_update = "UPDATE quotas set `cnt`=0 where idFacultet = ".$idFacultet;
;
?>
<html>
<head>

</head>
</html>
<div class="quotas-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a data-toggle="tab" href="#panel0">Распеделение стипендиального обеспечения</a></li>
                <li><a data-toggle="tab" href="#panel20">Все заявления-анкеты</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <div id="panel0" class="tab-pane fade in active">

                    <div class="row">
                        <div class="col-lg-12" align="right"> 
                            <?php   if (User::isSotrudnik(Yii::$app->user->identity->email)){ ?>


                            <?php
                            echo Html::a('<i class="glyphicon glyphicon-print"></i>', ['/quotas/mpdf'], [
                                'class'=>'btn btn-success', 
                                'target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Распечатать итоговый список'
                            ]);
                            ?>   
                            
                            <?= Html::a('<i class="glyphicon glyphicon-check"></i>', ['fix', 'idFacultet' => $idFacultet], ['class' => 'btn btn-warning', 'title'=>'Зафиксировать',
                                    'data' => [
                                        'confirm' => 'Зафиксировать стипендиатов и их достижения?',
                                        'method' => 'post',
                                    ],
                            ]) ?>
 
                            <?php }?>
                        </div>
                    </div>
                    <h2><?= Html::encode($this->title) ?></h2>
                        
                    <?php   if (User::isSotrudnik(Yii::$app->user->identity->email)){ ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'pjax' => true,
                        'export' => false,
                        'columns' => [
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
                    ]); 
                    }

                    if (User::isStudent(Yii::$app->user->identity->email)){ ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'pjax' => true,
                        'export' => false,
                        'columns' => [
                            [
                                'attribute' => 'cnt',
                                'header' => 'Всего'
                            ],
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
                        ],
                    ]); 
                    }
                    ?>

                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#panel1">Учебная</a></li>
                      <li><a data-toggle="tab" href="#panel2">Научно-исследовательская</a></li>
                      <li><a data-toggle="tab" href="#panel3">Общественная</a></li>
                      <li><a data-toggle="tab" href="#panel4">Культурно-творческая</a></li>
                      <li><a data-toggle="tab" href="#panel5">Спортивная</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="panel1" class="tab-pane fade in active">
                        <h3>Учебная</h3>
                        <p>
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
                        </p>
                      </div>
                      <div id="panel2" class="tab-pane fade">
                        <h3>Научно-исследовательская</h3>
                        <p>
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
                        </p>              
                    </div>
                      <div id="panel3" class="tab-pane fade">
                        <h3>Общественная</h3>
                        <p>
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
                        </p>              </div>
                      <div id="panel4" class="tab-pane fade">
                        <h3>Культурно-творческая</h3>
                        <p>
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
                        </p>              </div>
                      <div id="panel5" class="tab-pane fade">
                        <h3>Спортивная</h3>
                        <p>
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
                        </p>              </div>
                    </div>
                </div>
                <div id="panel20" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo Highcharts::widget([
                                'scripts' => [
                                    // 'modules/exporting',
                                    'themes/grid-light',
                                ],
                                'options' => [
                                        'chart'=>[
                                            // 'height'=>1000,        
                                            'width'=>400,
                                            ],
                                    'title' => [
                                        'text' => 'Соотношение поданных заявлений и доступных мест',
                                    ],
                                    'xAxis' => [
                                        'categories' => ['Учебная', 'Научная', 'Общественная', 'Творческая', 'Спортивная'],
                                        // 'tickInterval' => 1,
                                    ],
                                    'labels' => [
                                        'items' => [
                                            [
                                                // 'html' => 'Total fruit consumption',
                                                'style' => [
                                                    'left' => '50px',
                                                    'top' => '18px',
                                                    'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                                ],
                                            ],
                                        ],
                                    ],
                                    'series' => [
                                        [
                                            'type' => 'bar',
                                            'name' => 'Подано',
                                            'data' => [count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>1])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>2])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>3])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>4])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>5])->all())],
                                            'color' => 'IndianRed', // Jane's color

                                        ],
                                        [
                                            'type' => 'bar',
                                            'name' => 'Квота',
                                            'data' => [$study, $science, $social, $culture, $sport],
                                            'color' => 'MediumSeaGreen', // Jane's color
                                        ],
                                    
                                    ],
                                ]
                            ]);
                            ?>                        </div>
                        <div class="col-lg-5">
                            <?php
                            echo Highcharts::widget([
                                'scripts' => [
                                    // 'modules/exporting',
                                    'themes/grid-light',
                                ],
                                'options' => [
                                        'chart'=>[
                                            // 'height'=>1000,        
                                            'width'=>400,
                                            ],
                                    'title' => [
                                        'text' => 'Распределение направлений деятельности по факультету',
                                    ],
                                    'xAxis' => [
                                        'categories' => ['Apples', 'Oranges'],
                                    ],
                                    'labels' => [
                                        'items' => [
                                            [
                                                // 'html' => 'Распеределений заявлений по направлениям',
                                                'style' => [
                                                    'left' => '50px',
                                                    'top' => '18px',
                                                    'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),

                                                ],
                                            ],
                                        ],
                                    ],
                                    'series' => [

                                        [
                                            'type' => 'pie',
                                            'name' => 'Всего подано заявок',
                                            'data' => [
                                                [
                                                    'name' => 'Учебная',
                                                    'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>1])->all()),
                                                    'color' => 'Coral', // Jane's color
                                                ],
                                                [
                                                    'name' => 'Научная',
                                                    'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>2])->all()),
                                                    'color' => 'IndianRed', // Jane's color
                                                ],
                                                [
                                                    'name' => 'Общественная',
                                                    'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>3])->all()),
                                                    'color' => 'MediumSeaGreen', // Jane's color
                                                ],
                                                [
                                                    'name' => 'Творческая',
                                                    'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>4])->all()),
                                                    'color' => 'SteelBlue', // Jane's color
                                                ],
                                                [
                                                    'name' => 'Спортивная',
                                                    'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>5])->all()),
                                                    'color' => 'MediumPurple', // Jane's color
                                                ],
                                            ],
                                            'center' => [180, 80],
                                            'size' => 200,
                                            'showInLegend' => false,
                                            'dataLabels' => [
                                                'enabled' => true,
                                            ],
                                        ],
                                    ],
                                ]
                            ]);
                            ?>                        </div>
                    </div>
                 <h2><?= Html::encode('Все заявления-анкеты') ?></h2>
                    <?php   if (User::isStudent(Yii::$app->user->identity->email)){ ?>
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
                                    // 'idStudent',
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
                                    'r3'=>[
                                            'label'=>'Направление подготовки', 
                                            'value' => function ($model, $index, $widget) {
                                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                                return Napravlenie::findOne($s)['shifr'].' '.Napravlenie::findOne($s)['name'];;},
                                    ],
                                    'r3'=>[
                                        'label'=>'Направление деятельности',
                                        'value' => function ($model, $index, $widget) {
                                                return $model->idActivity0->name ;},
                                    ],
                                    'mark'=>[
                                        'label'=>'Доля оценок отлично',
                                        'value' => 'mark'
                                    ],      
                                    'r1'=>[
                                        'label'=>'Рейтинг',
                                        'value' => 'r1'
                                    ],
                                    [
                                        'class' => ActionColumn::className(),
                                        'template'=>'{view}',
                                        'contentOptions'=>['style'=>'max-width: 25px;'],
                                        'visible'=>false,
                                    ],
                                ],
                            ]); 
                            ?>
                            <?php } else {?>
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
                                    // 'idStudent',
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
                                    'r3'=>[
                                            'label'=>'Направление подготовки', 
                                            'value' => function ($model, $index, $widget) {
                                                $s = Sgroup::findOne($model->idStudent0->idGroup)['idNapravlenie'];
                                                return Napravlenie::findOne($s)['shifr'].' '.Napravlenie::findOne($s)['name'];;},
                                    ],
                                    'r3'=>[
                                        'label'=>'Направление деятельности',
                                        'value' => function ($model, $index, $widget) {
                                                return $model->idActivity0->name ;},
                                    ],
                                    'mark'=>[
                                        'label'=>'Доля оценок отлично',
                                        'value' => 'mark'
                                    ],      
                                    'r1'=>[
                                        'label'=>'Рейтинг',
                                        'value' => 'r1'
                                    ],
                                    [
                                        'class' => ActionColumn::className(),
                                        'template'=>'{view}',
                                        'contentOptions'=>['style'=>'max-width: 25px;'],
                                        'visible'=>true,
                                    ],
                                ],
                            ]); 
                            ?>
                            <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>     
            <?php
            $this->registerJs('
                var gridview_id = ""; // specific gridview
                var columns = [2]; // index column that will grouping, start 1
         

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