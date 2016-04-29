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
      <li class="active"><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>научно-исследовательской</b> деятельности</FONT></p>

    <table width="1000" border="1">
       <col width="30" valign="top">
       <col width="300" valign="top">
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
        <td><input type="text" name="rating" class="rating" value=""><br></td>
      </tr>
      <tr>
        <?php 
          $grants = Grants::find()->where(['idStudent'=>Yii::$app->user->identity->id])->all();
          $patents = Patents::find()->where(['idStudent'=>Yii::$app->user->identity->id])->all();
          $rowspan = 2 + (count($grants)+count($patents));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>
        <td colspan="2"><b>Получение студентом в течение 2 лет, предшествующих назначению повышенной стипендии, награды (приза) за результаты НИР, наличие гранта, патента, свидетельства</td>
      </tr>
        <?php
          foreach ($grants as $row){?> 
            <tr>
              <td><i>наличие награды</i> (приза) за результаты НИР, год получения</td>
                <td>
                  <?php echo $row->nameProject.", ".$row->dateBegin;?>
                </td>
            </tr>
            <?php
          }
        ?>

        <?php
          foreach ($patents as $row){?> 
            <tr>
              <td>наличие гранта, патента, свидетельства, год получения</td>
                <td>
                  <?php echo $row->name.", ".$row->dateApp;?>
                </td>
            </tr>
            <?php
          }
        ?>
      <tr>
        <tr>
          <td rowspan="4" >6</td>
          <td colspan="2"><b>Наличие публикаций в научном (учебно-научном, методическом) международном,всероссийском, ведомственном издании (в течение года до назначения стипендии)</td>
        </tr>
        <tr>
            <td><i>Вид публикаций</i> и их количество (статьи, тезисы, прочие публикации)</td>
            <td>
              <?php
                  $articles = Yii::$app->db->createCommand('SELECT tA.name as typeArticleName, count(*) as count, tA.value as value FROM articles a, typeArticle tA WHERE a.idStudent = :id and a.idType = tA.id group by typeArticleName')
                                ->bindValue(':id', Yii::$app->user->identity->id)
                                ->queryAll();
                  foreach ($articles as $row) {      
                     echo "{$row['typeArticleName']}: {$row['count']}<br>";
                  }
              ?>
            </td>
        </tr>
      </tr>
      <tr>
        <td>Статус издания (международное, всероссийское, региональное, ведомственное)</td>
        <td>          
          <?php
              $articles = Yii::$app->db->createCommand('SELECT se.name as statusEvent, count(*) as count, se.value as value FROM articles a, statusEvent se WHERE a.idStudent = :id and a.idStatus = se.id group by statusEvent')
                            ->bindValue(':id', Yii::$app->user->identity->id)
                            ->queryAll();
              foreach ($articles as $row) {      
                echo "{$row['statusEvent']}: {$row['count']}<br>";
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>Объем публикаций в печатных листах</td>
        <td>
          <?php
              $articles = Yii::$app->db->createCommand('select se.name as statusEvent, round((sum(a.volumePublication)/8)*0.93, 2) as volumePublication from articles a, statusEvent se where idStudent = :id and a.idStatus = se.id group by statusEvent')
                            ->bindValue(':id', Yii::$app->user->identity->id)
                            ->queryAll();
              foreach ($articles as $row) {      
                echo "{$row['statusEvent']}: {$row['volumePublication']} п.л.<br>";
              }
          ?>
        </td>
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
        <td colspan="2"><b>Публичное представление в течение года, предшествующего назначению повышенной стипендии, результатов научно-исследовательской работы, в том числе путем выступления с докладом (сообщением) на конференции, семинаре и ином международном, всероссийском, ведомственном, региональном мероприятии:</td>
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
        }
      ?>
    </table>
</div>