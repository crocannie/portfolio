<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\EventType;
use common\models\Sgroup;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Виды мероприятий';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Критерии для отбора стипендиатов';
?>
<div class="rating-index">
<?php  
    $status = urldecode('index.php?r=rating/status&id='.$idFacultet); 
    $contest = urldecode('index.php?r=rating/contest&id='.$idFacultet); 
    $article = urldecode('index.php?r=rating/article&id='.$idFacultet); 
?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$status?>>Статус мероприятий</a></li>
      <li><a href=<?=$contest?>>Виды мероприятий</a></li>
      <li class="active"><a href=<?=$article?>>Виды статей</a></li>
    </ul><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idFacultet',
            'idTable',
            'idItem',
            'value',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php
    echo "Test".'<br>';
    $id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $sql = 'select s.id, v.idItem, s.name, v.value, v.idFacultet from statusEvent s, valuesRating v where v.idFacultet = :id and s.id = v.idItem';
    $statusEvent = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $idFacultet)
                            ->queryAll();

    foreach($statusEvent as $row){
        echo '<br>'.$row['id'].' '.$row['name'].' '.$row['value'].'<br>';
    }



   // $test = StatusEvent::find()
   //                      ->select('statusEvent.id, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
   //                      ->from('statusEvent, valuesRating')
   //                      ->where(['valuesRating.idFacultet'=>$idFacultet])
   //                      ->andwhere('statusEvent.id = valuesRating.idItem');
   //  echo count($test);
   //  foreach($test as $row){
   //      // echo '<br>'.$row['id'].' '.$row['name'].' '.$row['value'].'<br>';
   //  }
?>
</div>
