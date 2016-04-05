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
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">

<style type="text/css">
  table {
    border-collapse: collapse; /*убираем пустые промежутки между ячейками*/
    border: 1px solid #dddddd; /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
  }
  td, th {
    border: 1px solid #dddddd;
    padding: 10px;

  }
  th{
    text-align: center;
  }
  li {
    margin-left: 10px;
  }
  .zebra {
    list-style: none;
    border-left: 10px solid #FC7574;
    padding: 0;
    /*font-family: "Lucida Sans";*/
  }
  .zebra li {
    padding: 10px;
  }
  .zebra li:nth-child(odd) {
    background: #E1F1FF;
  }
  .zebra li:nth-child(even) {
    background: white;
  }
  .zebra {
    list-style: none;
    border-left: 8px solid #7ba579;
    padding: 10;
    margin-left: 20px;
/*    font-family: "Lucida Sans";
*/  }
  .zebra li {
    padding: 1px;
  }
  .zebra li:nth-child(odd) {
    background: white;
  }
  .zebra li:nth-child(even) {
    background: white;
  }
</style>

<h4>Критерий <b>Статус мероприятий</b> применяется при оценивании: </h4>
<ul class="zebra">
  <li>участия студента в мероприятиях</li>
  <li>статуса издания публикаций</li>
</ul><br>

Используется в следующих направлениях деятельности:
<ul class="zebra">
  <li>учебная</li>
  <li>научно-исследовательская</li>
  <li>общественная</li>
  <li>культурно-творческая</li>
  <li>спортивная</li>
</ul><br>

<table  width="450" border="1" >
  <col width="200" valign="top">
  <col width="200" valign="top">
  <col width="50" valign="top">
    <tr>
      <th>Название</th>
      <th>Значение</th>
      <th></th>
    </tr>
      <?php foreach ($model as $row){?>
    <tr>        
      <td>
        <?php
          echo $row['name'].'<br>';
        ?>
      </td>
      <td>
        <?php echo $row['value'].'<br>'; ?>
      </td>
      <td>
        <?php echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $row['id']]).'<br>'; }?>
      </td>
    </tr>
</table>

</div>
