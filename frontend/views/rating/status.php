<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\StatusEvent;
use common\models\Sgroup;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Статус мероприятий';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Критерии для отбора стипендиатов';
?>
<div class="rating-index">
    
<?php 
    // $grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
    // $patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 
    // $articles = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
    // $participation = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id); 
    $status = urldecode('index.php?r=rating/status&id='.$idFacultet); 
    $contest = urldecode('index.php?r=rating/contest&id='.$idFacultet); 
    $article = urldecode('index.php?r=rating/article&id='.$idFacultet); 
?>
    <ul class="nav nav-tabs">
      <li class="active"><a href=<?=$status?>>Статус мероприятий</a></li>
      <li><a href=<?=$contest?>>Виды мероприятий</a></li>
      <li><a href=<?=$article?>>Виды статей</a></li>
    </ul><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                                'headerOptions' => ['width' => '50']
],
            // 'idFacultet',
            // 'idTable',
            // 'idItem',
                'name'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Название',
                    'value' => function ($model, $index, $widget) {
                        return $model->name ;},
                    'headerOptions' => ['width' => '50']
                ], 
                'value'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Значение',
                    'value' => function ($model, $index, $widget) {
                        return $model->value ;},
                    'headerOptions' => ['width' => '50']
                ],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php
   //  echo "Test".'<br>';
   //  $id = Yii::$app->user->identity->id;
   //  $sotrudnik = Sotrudnik::findOne($id);
   //  $idFacultet = $sotrudnik->idFacultet0->id;
   //  $sql = 'select s.id, v.idItem, s.name, v.value, v.idFacultet from statusEvent s, valuesRating v where v.idFacultet = :id and s.id = v.idItem';
   //  $statusEvent = Yii::$app->db->createCommand($sql)
   //                          ->bindValue(':id', $idFacultet)
   //                          ->queryAll();

   //  foreach($statusEvent as $row){
   //      echo '<br>'.$row['id'].' '.$row['name'].' '.$row['value'].'<br>';
   //  }


   // $test = StatusEvent::find()
   //                      ->select('statusEvent.id, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
   //                      ->from('statusEvent, valuesRating')
   //                      ->where(['valuesRating.idFacultet'=>$idFacultet])
   //                      ->andwhere('statusEvent.id = valuesRating.idItem');
   //  echo count($test);
?>
</div>
