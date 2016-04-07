<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\StatusEvent;
use common\models\Sgroup;
error_reporting( E_STRICT);
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$status = urldecode('index.php?r=rating/status&id='.$idFacultet); 
$contest = urldecode('index.php?r=rating/contest&id='.$idFacultet); 
$article = urldecode('index.php?r=rating/article&id='.$idFacultet); 

$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Статус мероприятий';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Критерии для отбора стипендиатов';
?>

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
<div class="row">
  <div class="col-lg-3">
    <ul class="nav nav-pills nav-stacked" style="width: 200px;">
        <li class="active"><a href=<?=$status?>>Статус мероприятий</a></li>
        <li><a href=<?=$article?>>Виды мероприятий</a></li>
        <li><a href=<?=$article?>>Награды</a></li>
        <li><a href=<?=$article?>>Виды публикаций</a></li>
        <li><a href=<?=$article?>>Соавторство</a></li>
        <li><a href=<?=$article?>>Направления науки</a></li>
        <li><a href=<?=$article?>>Панетенты</a></li>
        <li><a href=<?=$article?>>Статус патента</a></li>
        <li><a href=<?=$article?>>Виды конкурсов</a></li>
        <li><a href=<?=$article?>>Виды участий</a></li>
        <li><a href=<?=$article?>>Коэффициент студента</a></li>
      </ul>
  </div>
  <div class="col-lg-6">
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
</div>
</div>
