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
      <li class="active"><a href=<?=$contest?>>Виды мероприятий</a></li>
      <li><a href=<?=$article?>>Виды статей</a></li>
    </ul><br>
<style type="text/css">
  table {
    border-collapse: collapse; 
    border: 1px solid #dddddd;
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
    border-left: 5px solid #7ba579;
    padding: 10;
    margin-left: 20px;
 }
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
<div class="rating-index">
   <h4>Критерий <b>Виды мероприятий</b> применяется для оценивания: </h4>
<ul class="zebra">
  <li>мероприятий, в которых принимал участие студент</li>
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
  <col width="30" valign="top">
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
        <?php echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $row['idValue'], 'idFac'=>$idFacultet]).'<br>'; }?>
      </td>
    </tr>
</table>

</div>
