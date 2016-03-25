<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\db\Command;
use yii\widgets\ActiveForm;
use yii\widgets\Alert;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsSport;
use common\models\PerformanceCulture;
use common\models\ParticipationSport;
use common\models\rating\Culture;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 
$this->params['breadcrumbs'][] = ['label' => 'Достижения', 'url' => $all];

$idStudent = Yii::$app->user->identity->id;
$this->title = 'Заявления-анкеты';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-index">
    <h2><?= Html::encode('Направления деятельности') ?></h2>
	<?php 
      $ud = urldecode('index.php?r=form/ud&id='.Yii::$app->user->identity->id); 
	  $nid = urldecode('index.php?r=form/ud'); 
      $od = urldecode('index.php?r=form/od&id='.Yii::$app->user->identity->id);       
      $ktd = urldecode('index.php?r=form/ktd&id='.Yii::$app->user->identity->id); 
      $sd = urldecode('index.php?r=form/sd&id='.Yii::$app->user->identity->id); 

	?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li class="active"><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>спортивной</b> деятельности</FONT></p>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">

<style type="text/css">
table {
  border-collapse: collapse; /*убираем пустые промежутки между ячейками*/
  border: 2px solid #dddddd; /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
}

td {
  border: 2px solid #dddddd;
  padding: 3px;

}
</style>
<?php
  $status = Culture::getStatus($idStudent);
  $count = Culture::getCount($idStudent);

  foreach ($status as $row) {$value = $row['status'];}

  foreach ($count as $row) {$test = $row['countS']; }
?>


<table width="1000" border="1">
       <col width="30" valign="top">
      <tr>
        <td>1</td>
        <td>ФИО претендента</td>
        <?php
          $student = Students::findOne(Yii::$app->user->identity->id);
        ?>
        <td><?php echo $student->secondName." ".$student->firstName." ".$student->midleName ?></td>
      </tr>     
      <tr>
        <td>2</td>
        <td>Группа, факультет</td>
        <td><?php echo $student->idGroup0->name.", ".$student->idFacultet0->name?><br></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Код и наименование направления подготовки/специальности</td>
        <td><?php echo $student->idNapravlenie0->shifr.", ".$student->idNapravlenie0->name?> <br></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Доля оценок «отлично» от общего количества оценок</td>
        <td>    
          <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
    	 </td>
      </tr>
        <?php
          // $ret = $achievementsSport->getAchievementsSport($idStudent);
          // $sql = 'SELECT asp.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsSport asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idTypeContest = tc.id and asp.idDocumentTYpe = td.id AND asp.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          // $ret = Yii::$app->db->createCommand($sql)
          //               ->bindValue(':id', Yii::$app->user->identity->id)
          //               ->queryAll();
        $ret = AchievementsSport::getAll($idStudent);
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>        <td>Получение награды (приза) за результаты спортивной деятельности (в течение 2 последних лет)</td>
        <td>
          Количество мероприятий: 
          <?php
            // $ret = $achievementsSport->getAchievementsSport($idStudent);
            echo count($ret);
          ?>
        </td>
      </tr>
        <?php
          // $ret = $achievementsSport->getAchievementsSport($idStudent);
            for ($i = 0; $i < count($ret); $i++){
        ?>
      <tr>
        <td>
          <?php
            $status = $ret[$i]['status'];
            $typeContest = $ret[$i]['typeContest'];
              echo "Статус: $status <br>Вид мероприятия: $typeContest";   
          ?>
        </td>
        <td>
          <?php
            $name = $ret[$i]['name'];
            $typeDocument = $ret[$i]['typeDocument'];
            $year = $ret[$i]['year'];
              echo "$name, $typeDocument, $year"; 
            } 
          ?>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Систематическое участие студента в спортивных мероприятиях воспитательного, пропагандистского характера и (или) иных общественно значимых спортивных мероприятиях</td>
        <td> 
          <?php
            // $ret = $sportParticipation->getSportParticipation($idStudent);
            // $sql = 'SELECT * FROM `sportParticipation` WHERE idStudent = :id AND sportParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
            // $ret = Yii::$app->db->createCommand($sql)
            //             ->bindValue(':id', Yii::$app->user->identity->id)
            //             ->queryAll();
        $ret = ParticipationSport::getAll($idStudent);
              foreach ($ret as $row) {      
                $description = $row['description'];
                $count = $row['count'];
                echo "Количество мероприятий: $count, $description <br>";
              }         
          ?>
        </td>     
      </tr>
    </table>