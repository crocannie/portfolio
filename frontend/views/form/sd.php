<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\db\Command;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsStudy;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 
$this->params['breadcrumbs'][] = ['label' => 'Достижения', 'url' => $all];

$this->title = 'Заявления-анкеты';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-index">
    <h2><?= Html::encode('Направления деятельности') ?></h2>
	<?php 
      $ud = urldecode('index.php?r=form/ud&id='.Yii::$app->user->identity->id); 
	    $nid = urldecode('index.php?r=form/nid&id='.Yii::$app->user->identity->id); 
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

<table width="1000" border="1">
       <col width="30" valign="top">
      <tr>
        <td>1</td>
        <td>ФИО претендента</td>
        <td><?php echo $model->secondName." ".$model->firstName." ".$model->midleName ?></td>
      </tr>     
      <tr>
        <td>2</td>
        <td>Группа, факультет</td>
        <td><?php echo $model->idGroup0->name.", ".$model->idFacultet0->name?><br></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Код и наименование направления подготовки/специальности</td>
        <td><?php echo $model->idNapravlenie0->shifr.", ".$model->idNapravlenie0->name?> <br></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Доля оценок «отлично» от общего количества оценок</td>
        <td><input type="text" name="rating" class="rating" value=""><br></td>
      </tr>
      <tr>
        <?php
          // $ret = $achievementsSport->getAchievementsSport($idStudent);
          $sql = 'SELECT asp.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsSport asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idTypeContest = tc.id and asp.idDocumentTYpe = td.id';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
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
            $sql = 'SELECT * FROM `sportParticipation` WHERE idStudent = :id';
            $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
              foreach ($ret as $row) {      
                $description = $row['description'];
                $count = $row['count'];
                echo "Количество мероприятий: $count, $description <br>";
              }         
          ?>
        </td>     
      </tr>
    </table>