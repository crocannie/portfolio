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
	    $nid = urldecode('index.php?r=form/ud'); 
      $od = urldecode('index.php?r=form/od&id='.Yii::$app->user->identity->id);       
      $ktd = urldecode('index.php?r=form/ktd&id='.Yii::$app->user->identity->id); 
      $sd = urldecode('index.php?r=form/sd&id='.Yii::$app->user->identity->id); 

	?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li class="active"><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>культурно-творческой</b> деятельности</FONT></p>

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
          // $ret = $achievementsKTD->getAchievementsKTD($idStudent);
          $sql = 'SELECT aktd.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsKTD aktd, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and aktd.idStatus = se.id and aktd.idTypeContest = tc.id and aktd.idDocumentTYpe = td.id';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>
        <td><b>Наличие награды (приза) за результаты КТД, осуществленной им в рамках деятельности, проводимой учреждением высшего профессионального образования или иной организацией (за 2 последних года) с указанием названия, года, типа награды:</td>
        <td>
          Количество мероприятий: 
          <?php
            // $ret = $achievementsKTD->getAchievementsKTD($idStudent);
            echo count($ret);
          ?>
        </td>
      </tr>
        <?php
          // $ret = $achievementsKTD->getAchievementsKTD($idStudent);
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
        <?php
          // $ret = $publicPerformance->getPublicPerformance($idStudent);
          $sql = 'select pp.*, st.name as status, tpp.name as type, td.name as documentType from publicPerformance pp, statusEvent st, typePublicPerformance tpp, typeDocument td where idStudent = :id and pp.idStatus = st.id and pp.idTypePublicPerformance = tpp.id and pp.idDocumentType = td.id';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>6</td>";
        ?>
        <td><b>Публичное представление произведения литературы или искусства, созданного студентом (в течение 1 последнего года) с указанием названия произведения, места и года представления:</td>
        <td>Количество мероприятий: 
          <?php
            // $ret = $publicPerformance->getPublicPerformance($idStudent);
            echo count($ret);
          ?>
        </td>
      </tr>
        <?php
          // $ret = $publicPerformance->getPublicPerformance($idStudent);
            for ($i = 0; $i < count($ret); $i++){
        ?>
      <tr>
        <td>
          <?php
            $type = $ret[$i]['type'];
            echo "$type";
          ?>
        </td>
        <td>
          <?php
            $name = $ret[$i]['name'];
            $year = $ret[$i]['year'];
            $typeDocument = $ret[$i]['documentType'];
            echo "$name, $typeDocument, $year";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>7</td>
        <td><b>Систематическое участие студента в проведении (обеспечении проведения) публичной культурно-творческой деятельности воспитательного, пропагандистского характера и иной общественно значимой публичной культурно-творческой деятельности</td>
        <td> 
          <?php
            // $ret = $ktdParticipation->getKtdParticipation($idStudent);
          $sql = 'SELECT * FROM `ktdParticipation` WHERE idStudent = :id';
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