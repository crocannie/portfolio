<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\db\Command;
use yii\widgets\ActiveForm;
use yii\widgets\Alert;
use app\models\Date;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsStudy;
use common\models\rating\Science;
use common\models\rating\Student;
use common\models\rating\Value;
use common\models\User;
use common\models\Sotrudnik;
use common\models\StatusEvent;

// error_reporting(E_ALL ^ E_STRICT);
// error_reporting(E_ERROR);
// error_reporting(E_ALL);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 
  if (User::isStudent(Yii::$app->user->identity->email)){
    $idStudent = Yii::$app->user->identity->id;
    $this->params['breadcrumbs'][] = ['label' => 'Достижения', 'url' => $all];
    $this->title = 'Заявления-анкеты';
    $this->params['breadcrumbs'][] = $this->title;
    $idFacultet = Students::findOne(Yii::$app->user->identity->id)->idFacultet0->id;

  }
  if (User::isSotrudnik(Yii::$app->user->identity->email)){
    $idStudent = $model->idStudent;
    $idFacultet = Sotrudnik::findOne(Yii::$app->user->identity->id)->idFacultet0->id;
    $this->title = 'Анкеты-заявления студентов';
    $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => urldecode('index.php?r=rating-student/index&id='.$idFacultet)];
    $this->params['breadcrumbs'][] = $this->title;
  }
  $student = Students::findOne($idStudent);

  $articles = Articles::getType($idStudent);
          $grants = Grants::find()
                            ->where(['idStudent'=>Yii::$app->user->identity->id,'status'=>0])
                            ->andWhere(['between', 'dateBegin',  date('Y-m-d', $date), date('Y-m-d')])
                            ->all();
          $patents = Patents::find()
                            ->where(['idStudent'=>Yii::$app->user->identity->id,'istatus'=>0])
                            ->andWhere(['between', 'dateApp',  date('Y-m-d', $date), date('Y-m-d')])
                            // ->andWhere(['istatus'=>0])
                            ->all();
          $ret = AchievementsStudy::getAll($idStudent);

?>
<?php
        $today = date('Y-m-d');
        $from = Date::find()->where(['idFacultet'=>$idFacultet])->one()->from;
        $to = Date::find()->where(['idFacultet'=>$idFacultet])->one()->to;
        // if (count($a) === 0){Yii::$app->session->setFlash('warning', 'Отсутствуют подтвержденные и доступные достижения для анкеты.');}
?>
<div class="form-index">
	<?php 
      $ud = urldecode('index.php?r=rating-student/study'); 
      $nid = urldecode('index.php?r=rating-student/science'); 
      $od = urldecode('index.php?r=rating-student/society');    
      $ktd = urldecode('index.php?r=rating-student/culture'); 
      $sd = urldecode('index.php?r=rating-student/sport'); 
	?>
  <?php if (User::isStudent(Yii::$app->user->identity->email)){?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li class="active"><a href=<?=$nid?>>Научно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
  <?php } ?>

<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>научно-исследовательской</b> деятельности</FONT></p>

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
  $status = Student::getStatus($idStudent, 2);
  $count = Student::getCount($idStudent, 2);
  foreach ($status as $row) {
    $value = $row['status'];
  }
  foreach ($count as $row) {
    $test = $row['countS'];
  }
  if ($test != 0){?>
<?php
  }else{
      foreach ($status as $row){
      }
  }?>
    <table  width="1143" border="1">
       <col width="30" valign="top">
       <col width="300" valign="top">
      <tr>
        <td>1</td>
        <td>ФИО претендента</td>
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
          <?php 
            $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); 
          ?>
          <?php if ($test != 0){ 
              $a = Student::find()->where(['idStudent'=>$idStudent])->andwhere(['idActivity'=>2])->all();
              foreach($a as $row){echo $row['mark'];}
          } else { 
              if ((count($grants)+count($patents)+count($articles)+count($ret)) === 0){Yii::$app->session->setFlash('warning', 'Отсутствуют подтвержденные и доступные достижения для анкеты.');}
                else{
                  if ($today < $from && $today > $to){}else {
            ?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
            <?php }}}?>
          </td>
      </tr>
      <tr>
        <?php 
          $date = strtotime('-2 years');

          $rowspan = 2 + (count($grants)+count($patents));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>
        <td colspan="2"><b>Получение студентом в течение 2 лет, предшествующих назначению повышенной стипендии, награды (приза) за результаты НИР, наличие гранта, патента, свидетельства</td>
      </tr>
        <?php
          $array = [];
          foreach ($grants as $row){?> 
            <tr>
              <td><i>наличие награды</i> (приза) за результаты НИР, год получения</td>
                <td>
                  <?php 
                    // echo $row->id;
                    array_push($array, $row->id);
                    echo $row->nameProject.", ".$row->dateBegin.'<br>';
                    echo "<a href={$row->location}><i class='glyphicon glyphicon-file'></i></a><br>";
                  ?>

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
                  <?php 
                    array_push($array, $row->id);
                    echo $row->name.", ".$row->dateApp.'<br>';
                    echo "<a href={$row->location}><i class='glyphicon glyphicon-file'></i></a><br>";
                  ?>
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
                  foreach ($articles as $row) {
                    echo $row['id'];
                  array_push($array, $row['id']);
                     echo "{$row['typeArticleName']}: {$row['count']}<br>";
                    echo "<a href={$row['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
                  }
              ?>
            </td>
        </tr>
      </tr>
      <tr>
        <td>Статус издания (международное, всероссийское, региональное, ведомственное)</td>
        <td>          
          <?php
			       $articles = Articles::getStatus($idStudent);
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
			$articles = Articles::getVolume($idStudent);
              foreach ($articles as $row) {      
                echo "{$row['statusEvent']}: {$row['volumePublication']} п.л.<br>";
              }
          ?>
        </td>
      </tr>
      <tr>
        <?php
          // $ret = Yii::$app->db->createCommand('SELECT asp.*, asp.dateEvent, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievements asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idEventType = tc.id and asp.idDocumentTYpe = td.id')
          //                   ->bindValue(':id', Yii::$app->user->identity->id)
          //                   ->queryAll();
          $rowspan = 4 + (3*count($ret));
          echo "<td rowspan={$rowspan}>7</td>";
        ?>
        <td colspan="2"><b>Публичное представление в течение года, предшествующего назначению повышенной стипендии, результатов научно-исследовательской работы, в том числе путем выступления с докладом (сообщением) на конференции, семинаре и ином международном, всероссийском, ведомственном, региональном мероприятии:</td>
      </tr>
      <?php
          for ($i = 0; $i < count($ret); $i++){
          array_push($array, $ret[$i]['id']);
      ?>
      <tr>
        <td><i>вид мероприятия</i> (конференция, семинар, соревнования)</td>
        <td>
          <?php
            $name = $ret[$i]['name'];
              echo "$name".'<br>';   
              echo "<a href={$ret[$i]['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
          ?>
        </td>
      </tr>
      <tr>
        <td>статус мероприятия (международное, всероссийское, региональное, ведомственное)</td>
        <td>
          <?php
            $statusEvent = $ret[$i]['status'];
              // echo "$statusEvent";    
            $idStatus = $ret[$i]['idStatus'];
            $s = StatusEvent::find()->where(['id'=>$idStatus])->one();
            echo $s->name;     
            
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
    <div class="science-create">
        <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>
        <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
        <?php
          $r1 = Value::getStudy($student->idFacultet, $student->idStudent);
          $r2 = Value::getArticleR($student->idFacultet, $student->idStudent);
          $r3 = Value::getScienceR($student->idFacultet, $student->idStudent);
          $r =  $r1 + $r2 + $r3; ?>
        <?= $form->field($model, 'r1')->hiddenInput(['value'=>$r])->label(false) ?>
    
        <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

        <?= $form->field($model, 'idActivity')->hiddenInput(['value'=>'2'])->label(false) ?>
<?php
    if ($test != 0){
      if($value == 1){ 
        Yii::$app->session->setFlash('success', 'Заявка отправлена.');
      }?>
<?php
    } else {
        if ($today < $from && $today < $to) {
          Yii::$app->session->setFlash('error', 'Сроки подачи заявлений c '.date("j.m.Y", strtotime($from)).' по '.date("j.m.Y", strtotime($to)).'. Вы не можете отправлять заявления.');
        }elseif(empty($from) || empty($to)){ Yii::$app->session->setFlash('error', 'Сроки подачи заявлений не установлены. Вы не можете отправлять заявления.');
        } elseif ((count($grants)+count($patents)+count($articles)+count($ret)) === 0) {
            Yii::$app->session->setFlash('warning', 'Отсутствуют подтвержденные и доступные достижения для анкеты.');
          }
            // if(count($a) === 0){}
            else{ ?>
              <div class="form-group">
                  <?= Html::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
<?php       }  
          // }
      }
?>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
// print_r ($array);
//             echo "<br>";
//             echo $comma_separated = implode(",", $array);
// echo $r1.'<br>';
// echo $r2.'<br>';
// echo $r3.'<br>';
// echo $r.'<br>';
// echo "<br>";
//        $status = Yii::$app->db->createCommand('
//                             select a.nameProject, r.value, a.dateBegin, a.nameProject, a.idStatus, r.idItem
//                             from valuesRating r, grants a
//                             where r.idFacultet = :idFacultet
//                             and r.idTable = 1
//                             and r.idItem = a.idStatus
//                             and a.idStudent = :idStudent
//                             and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
//                             ->bindValue(':idFacultet', $idFacultet)
//                             ->bindValue(':idStudent', $idStudent)
//                             ->queryAll();

//         $level = Yii::$app->db->createCommand('
//                             select  a.nameProject, r.value, a.dateBegin, a.nameProject, a.idLevel, r.idItem
//                             from valuesRating r, grants a
//                             where r.idFacultet = :idFacultet
//                             and r.idTable = 12
//                             and r.idItem = a.idLevel
//                             and a.idStudent = :idStudent
//                             and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
//                             ->bindValue(':idFacultet', $idFacultet)
//                             ->bindValue(':idStudent', $idStudent)
//                             ->queryAll();
        
//         $type = Yii::$app->db->createCommand('
//                             select  a.nameProject, r.value, a.dateBegin, a.nameProject, a.idTypeContest, r.idItem
//                             from valuesRating r, grants a
//                             where r.idFacultet = :idFacultet
//                             and r.idTable = 7
//                             and r.idItem = a.idTypeContest
//                             and a.idStudent = :idStudent
//                             and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
//                             ->bindValue(':idFacultet', $idFacultet)
//                             ->bindValue(':idStudent', $idStudent)
//                             ->queryAll();
        
//         $grantType = Yii::$app->db->createCommand('
//                             select  a.nameProject, r.value, a.dateBegin, a.nameProject, a.typeGrant, r.idItem
//                             from valuesRating r, grants a
//                             where r.idFacultet = :idFacultet
//                             and r.idTable = 13
//                             and r.idItem = a.typeGrant
//                             and a.idStudent = :idStudent
//                             and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
//                             ->bindValue(':idFacultet', $idFacultet)
//                             ->bindValue(':idStudent', $idStudent)
//                             ->queryAll();
//         for ($i = 0; $i < count($status); $i++){
//           echo $i.' '.'Status: '.$status[$i]['nameProject'].': '.$status[$i]['value'].'<br>';
//           echo $i.' '.'Type: '.$type[$i]['nameProject'].': '.$type[$i]['value'].'<br>';
//           echo $i.' '.'grantType: '.$grantType[$i]['nameProject'].': '.$grantType[$i]['value'].'<br>';
//           echo $i.' '.'Level: '.$level[$i]['nameProject'].': '.$level[$i]['value'].'<br>';
//           echo "<br>";
//         }
//         $R1 = null;
//         for ($i = 0; $i < count($type); $i++){
//           echo   $R1 += ($type[$i]['value'] * $grantType[$i]['value'] * $status[$i]['value'] * $level[$i]['value']);
//           echo "<br>";
//         }
?>
