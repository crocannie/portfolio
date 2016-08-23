<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\Sotrudnik;
use yii\data\SqlDataProvider;
use common\models\Students;
use app\models\Date;

$this->title = 'Подтверждение достижений';

$sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
$idFacultet = $sotrudnik->idFacultet0->id;
$dec = urldecode('index.php?r=student/index&id='.$idFacultet); 
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => $dec];

$this->params['breadcrumbs'][] = $this->title;
$from = Date::find()->where(['idFacultet'=>$idFacultet])->one()->from;
// $from = Date::find()->where(['idFacultet'=>$idFacultet])->one()->from;
// echo date('Y-m-d');
// echo "<br>";
// echo Date::find()->where(['idFacultet'=>1])->one()->from;
?>
<div class="achievements-study-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a data-toggle="tab" href="#panel10">Учебная <span class="badge pull-right"><?=$dataProvider->getCount()
?></span></a></li>
                <li><a data-toggle="tab" href="#panel20">Научно-исследовательская <span class="badge pull-right"><?=$dataProvider1->getCount()+$dataProvider2->getCount()+$dataProvider3->getCount()
?></span></a></li>
                <li><a data-toggle="tab" href="#panel30">Общественная <span class="badge pull-right"><?=$dataProvider4->getCount()
?></span></a></li>
                <li><a data-toggle="tab" href="#panel40">Творческая <span class="badge pull-right"><?=$dataProvider5->getCount()+$dataProvider6->getCount()+$dataProvider7->getCount()
?></span></a></li>
                <li><a data-toggle="tab" href="#panel50">Спортивная <span class="badge pull-right"><?=$dataProvider8->getCount()+$dataProvider9->getCount()
?></span></a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <?php if (empty($from)){}else{ ?>
                <div class="alert alert-warning alert-dismissable" style="width: 850px; height: 50px">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-exclamation"></i> Достижения необходимо проверить до <?php echo date("j.m.Y", strtotime($from))?></h4>
                </div>
                <?php } ?>

                <div id="panel10" class="tab-pane fade in active">
                        <h1><?= Html::encode('Достижения в учебной деятельности') ?></h1>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    //
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    //
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['achievements-study/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                </div>
                <div id="panel20" class="tab-pane">
                    <h1>Достижения в научно-исследовательской деятельности</h1>
                    <h3>Гранты</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider1,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                // 'name',
                                // 'id',
                                // 'idStudent',
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'nameProject',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['grants/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                    <h3>Патенты</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider2,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['patents/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                    <h3>Публикации</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider3,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя',
                                    // 'contentOptions'=>['style'=>'max-width: 50px;'],
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название',
                                    // 'contentOptions'=>['style'=>'max-width: 80px;'],
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['articles/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                </div>
                <div id="panel30" class="tab-pane">
                        <h1><?= Html::encode('Достижения в общестевенной деятельности') ?></h1>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider4,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'description',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['achievements-social/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                </div>
                <div id="panel40" class="tab-pane">
                        <h1><?= Html::encode('Достижения в культурно-творческой деятельности') ?></h1>
                        <h3>Награды</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider5,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['achievements-culture/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                        <h3>Публичные выступления</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider6,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['performance-culture/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                        <h3>Участие в организации</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider7,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'description',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['participation-culture/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                </div>
                <div id="panel50" class="tab-pane">
                        <h1><?= Html::encode('Достижения в спортивной деятельности') ?></h1>
                        <h3>Награды</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider8,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя'
                                ],       
                                [
                                    'attribute'=>'name',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['achievements-sport/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                        <h3>Участие в организации</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider9,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'fio',
                                    'label'=>'Фамилия Имя',
                                ],       
                                [
                                    'attribute'=>'description',
                                    'label'=>'Название'
                                ],   
                                // ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                                [
                                    'class' => \yii\grid\ActionColumn::className(),
                                    'visibleButtons' => [
                                        'view' => function ($model, $key, $index) {
                                            if (date('Y-m-d') < Date::find()->where(['idFacultet'=>1])->one()->from){
                                                return true;                                    
                                            }
                                            else return false;
                                         }
                                    ],
                                    'buttons'=>[
                                            'view'=>function ($url, $model) {
                                                $customurl=Yii::$app->getUrlManager()->createUrl(['participation-sport/view','id'=>$model['id']]); //$model->id для AR
                                                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                                               }
                                            ],
                                           'template'=>'{view}',
                                           'contentOptions'=>['style'=>'max-width: 30px;', 'class' => 'text-center'],
                                ]
                            ],
                        ]); ?>
                </div>
            </div>  
        </div>
    </div>
</div>