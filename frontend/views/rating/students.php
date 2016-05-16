<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\EventType;
use common\models\Sgroup;
use common\models\rating\Value;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Заявления студентов';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Анкеты-заявления студент';

$this->registerJsFile('sorttable.js');

?>

<div class="rating-index">
  <?php  
    $status = urldecode('index.php?r=rating/status&id='.$idFacultet); 
    // $contest = urldecode('index.php?r=rating/contest&id='.$idFacultet); 
    // $document = urldecode('index.php?r=rating/document&id='.$idFacultet); 
    // $article = urldecode('index.php?r=rating/article&id='.$idFacultet); 
    // $science = urldecode('index.php?r=rating/science&id='.$idFacultet); 
    // $patent = urldecode('index.php?r=rating/patent&id='.$idFacultet); 
    // $typeContest = urldecode('index.php?r=rating/typecontest&id='.$idFacultet); 
    // $level = urldecode('index.php?r=rating/education&id='.$idFacultet); 
    // $authorship = urldecode('index.php?r=rating/authorship&id='.$idFacultet); 
    // $statuspatent = urldecode('index.php?r=rating/statuspatent&id='.$idFacultet); 
    // $activity = urldecode('index.php?r=rating/activity&id='.$idFacultet); 
  ?>
  <div class="row">
    <div class="col-lg-1 col-lg-offset-9">
      <p><a class="btn btn-md btn-success" href=<?= $status ?>>Критерии для отбора стипендиатов</a></p>
    </div>
    <div class="col-lg-12">  
      <table  class="sortable" width="1145" border="1" >
        <col width="300" valign="top">
        <col width="200" valign="top">
        <col width="200" valign="top">
        <col width="200" valign="top">
        <col width="200" valign="top">
        <col width="30" valign="top">
          <tr>
            <th>ФИО</th>
            <th>Курс, группа</th>
            <th>Доля оценок "отлично"</th>
            <th>Направление</th>
            <th>Рейтинг</th>
            <th></th>
          </tr>
            <?php 
            foreach ($model as $row){
            // for ($i = 0; $i < $model['count']; $i++){
              ?>
          <tr>        
            <td rowspan="">
              <?php echo $row['idStudent'].' '.$row['secondName'].' '.$row['firstName'].' '.$row['midleName'];?>
            </td>
            <td>              
              <?= $row['kurs'].', '.$row['groupn'].'<br>'.$row['shifr'].' '.$row['napravlenie']?>
            </td>
            <td>             
              <?= $row['mark']?>
            </td>
            <td>              
              <?= $row['activity']?>
            </td>
            <td>
              <?= $row['sum'];?>
            </td>
            <td>
            <?php echo Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['update', 'id' => $row['idValue'], 'idFac'=>$idFacultet]).'<br>'; }?>
            </td>
          </tr>
        </table>

    </div>
  </div>
</div>