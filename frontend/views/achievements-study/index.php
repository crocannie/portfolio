<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\Sotrudnik;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 

$this->title = 'Учебная деятельность';

  if (User::isStudent(Yii::$app->user->identity->email)){
    $idStudent = Yii::$app->user->identity->id;
    $this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
  }
  if (User::isSotrudnik(Yii::$app->user->identity->email)){
      if($_GET['id']){
            $id = $_GET['id'];
            $idStudent = $id;
        }
    $sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $dec = urldecode('index.php?r=student/index&id='.$idFacultet); 
    $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => $dec];
  }
$this->params['breadcrumbs'][] = $this->title;
$ur = urldecode('index.php?r=achievements-study/index&id='.$idStudent);
$nir = urldecode('index.php?r=grants/index&id='.$idStudent); 
$or = urldecode('index.php?r=achievements-social/index&id='.$idStudent); 
$kr = urldecode('index.php?r=achievements-culture/index&id='.$idStudent); 
$sr = urldecode('index.php?r=achievements-sport/index&id='.$idStudent);?>
<div class="achievements-study-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a href=<?=$ur?>>Учебная деятельность</a></li>
                <li><a href=<?=$nir?>>Научно-исследовательская деятельность</a></li>
                <li><a href=<?=$or?>>Общественная деятельность</a></li>
                <li><a href=<?=$kr?>>Культурно-творческая деятельность</a></li>
                <li><a href=<?=$sr?>>Спортивная деятельность</a></li>
            </ul>
        </div>  

        <div class="col-lg-9">
            <h1><?= Html::encode($this->title) ?></h1>
<?php   if (User::isStudent(Yii::$app->user->identity->email)){
?>
            <p><?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?></p>
<?php } ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    // 'name',
                    // 'dateEvent',
                    [
                        'attribute' => 'name',
                        'contentOptions'=>['style'=>'max-width: 500px;', 'class' => 'text-left'],

                    ],
                    'dateEvent'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Дата',
                            'value' => function ($model, $index, $widget) {
                                return $model->dateEvent;},
                            'contentOptions'=>['style'=>'width: 100px;']
                    ],
                    'status'=>[
                        'class' => \yii\grid\DataColumn::className(),
                        'format' => 'html',
                        'label' => 'Статус',
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function($model, $index, $widget){
                            if ($model->status == 1){
                                return '<span class="label label-primary", title="Отправлено на проверку"><span class="glyphicon glyphicon-envelope"></span></span>';
                            }
                            if ($model->status == 0){
                                return '<span class="label label-success", title="Принято"><span class="glyphicon glyphicon-ok"></span></span>';
                            }
                            if ($model->status == 2){
                                return '<span class="label label-danger", title="На редактирование: '.$model->message.'"><span class="glyphicon glyphicon-pencil"></span></span>';
                            }
                            if ($model->status == 3){
                                return '<span class="label label-warning", title="Не используется в анкетах"><span class="glyphicon glyphicon-remove"></span></span>';
                            }
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'visibleButtons' => [
                            'update' => function ($model, $key, $index) {
                                if (User::isSotrudnik(Yii::$app->user->identity->email)) {
                                    return false;
                                } else {
                                    if (($model->status == 0) or ($model->status == 3)){
                                        return false;                                    
                                    }else return true;
                                }

                             },
                            'delete' => function ($model, $key, $index) {
                                if (User::isSotrudnik(Yii::$app->user->identity->email)){
                                    return false;                                    
                                }
                                else return true;
                             },
                        ],
                        'contentOptions'=>['style'=>'max-width: 100px;', 'class' => 'text-left'],
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>