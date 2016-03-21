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
      <li class="active"><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
      
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>учебной</b> деятельности</FONT></p>

    <table width="1000" border="1">
       <col width="30" valign="top">
       <col width="300" valign="top">
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
          // $ret = $achievement->getAchievement($idStudent);
          $ret = Yii::$app->db->createCommand('SELECT asp.*, asp.dateEvent, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievements asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idEventType = tc.id and asp.idDocumentTYpe = td.id')
                            ->bindValue(':id', Yii::$app->user->identity->id)
                            ->queryAll();

          $rowspan = 4 + (3*count($ret));
          echo "<td rowspan={$rowspan}>7</td>";
        ?>
        <td colspan="2"><b>Признание претендента победителем или призером международной, всероссийской олимпиады, конкурса, соревнования, состязания, иного мероприятия, направленного на выявление  учебных  достижений  претендента (в  течение  2  лет,  предшествующих назначению повышенной стипендии):</td>
      </tr>
      <?php
        // $ret = $achievement->getAchievement($idStudent);
        //foreach ($ret as $row) {
          for ($i = 0; $i < count($ret); $i++){
      ?>
      <tr>
        <td><i>вид мероприятия</i> (конференция, семинар, соревнования)</td>
        <td>
          <?php
            $name = $ret[$i]['name'];
              echo "$name";   
            
          ?>
        </td>
      </tr>
      <tr>
        <td>статус мероприятия (международное, всероссийское, региональное, ведомственное)</td>
        <td>
          <?php
            $statusEvent = $ret[$i]['status'];
              echo "$statusEvent";    
            
          ?>
        </td>
      </tr>
      <tr>
        <td>год проведения </td>
        <td>
          <?php
            $dateEvent = $ret[$i]['dateEvent'];
              echo "$dateEvent";         
          ?>
        </td>
      </tr>
      <?php

        //  }
        }
      ?>
    </table>