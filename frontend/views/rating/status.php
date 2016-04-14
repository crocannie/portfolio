<?php
//https://pixabay.com/en/home-office-workstation-office-336373/
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\StatusEvent;
use common\models\Sgroup;
// error_reporting( E_STRICT);
error_reporting( E_STRICT);
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$status = urldecode('index.php?r=rating/status&id='.$idFacultet); 
$contest = urldecode('index.php?r=rating/contest&id='.$idFacultet); 
$document = urldecode('index.php?r=rating/document&id='.$idFacultet); 
$article = urldecode('index.php?r=rating/article&id='.$idFacultet); 
$science = urldecode('index.php?r=rating/science&id='.$idFacultet); 
$patent = urldecode('index.php?r=rating/patent&id='.$idFacultet); 
$typeContest = urldecode('index.php?r=rating/typecontest&id='.$idFacultet); 
$level = urldecode('index.php?r=rating/education&id='.$idFacultet); 
$authorship = urldecode('index.php?r=rating/authorship&id='.$idFacultet); 
$statuspatent = urldecode('index.php?r=rating/statuspatent&id='.$idFacultet); 
$activity = urldecode('index.php?r=rating/activity&id='.$idFacultet); 
$activity = urldecode('index.php?r=rating/activity&id='.$idFacultet); 

$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Статус мероприятий';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Критерии для отбора стипендиатов';
?>
<div class="rating-index">
<div class="row">
  <div class="col-lg-3">
    <ul class="nav nav-pills nav-stacked" style="width: 200px;">
        <li class="active"><a href=<?=$status?>>Статус мероприятий</a></li>
        <li><a href=<?=$contest?>>Виды мероприятий</a></li>
        <li><a href=<?=$document?>>Награды</a></li>
        <li><a href=<?=$article?>>Виды публикаций</a></li>
        <li><a href=<?=$authorship?>>Cоавторство</a></li>
        <li><a href=<?=$science?>>Направления науки</a></li>
        <li><a href=<?=$patent?>>Панетенты</a></li>
        <li><a href=<?=$statuspatent?>>Статус патента</a></li>
        <li><a href=<?=$typeContest?>>Виды конкурсов</a></li>
        <li><a href=<?=$article?>>? Виды участий</a></li>
        <li><a href=<?=$level?>>Коэффициент студента</a></li>
        <li><a href=<?=$activity?>>Направления деятельности</a></li>
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

    <span class="label label-warning">Внимание </span> 
    <div class="alert alert-warning alert-dismissible fade in" role="alert" style="width: 450px; text-align: center; height: 50px">
      <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span>-->
      </button>
      <h4>Значения показателей от 0.5 до 2 </h4>
    </div>
    
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
