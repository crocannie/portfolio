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
use common\models\AchievementsCulture;
use common\models\PerformanceCulture;
use common\models\ParticipationCulture;
use common\models\rating\Culture;
use common\models\rating\Student;
use common\models\rating\Value;
use common\models\User;
use common\models\Sotrudnik;

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

  $status = Student::getStatus($idStudent, 4);
  $count = Student::getCount($idStudent, 4);

  foreach ($status as $row) {
    $value = $row['status'];
  }

  foreach ($count as $row) {
    $test = $row['countS'];
  }
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
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li class="active"><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
  <?php } ?>

<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>культурно-творческой</b> деятельности</FONT></p>

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
$status = Student::getStatus($idStudent, 4);
  $count = Student::getCount($idStudent, 4);

  foreach ($status as $row) {
    $value = $row['status'];
  }

  foreach ($count as $row) {
    $test = $row['countS'];
  }
?>
    <table  width="1000"  border="1">
       <col width="30"    valign="top">
       <col width="300"   valign="top">
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
          <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
          <?php if ($test != 0){ 
              $a = Student::find()->where(['idStudent'=>$idStudent])->andwhere(['idActivity'=>4])->all();
              foreach($a as $row){echo $row['mark'];}
          } else {;?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
            <?php }?>
       </td>
      </tr>
 <tr>
        <?php
          // $ret = $achievementsKTD->getAchievementsKTD($idStudent);
          // $sql = 'SELECT aktd.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsKTD aktd, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and aktd.idStatus = se.id and aktd.idTypeContest = tc.id and aktd.idDocumentTYpe = td.id';
          $ret = AchievementsCulture::getAll($idStudent);
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>
        <td>Наличие <i>награды (приза)</i> за результаты КТД, осуществленной им в рамках деятельности, проводимой учреждением высшего профессионального образования или иной организацией (за 2 последних года) с указанием названия, года, типа награды:</td>
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
            $typeContest = $ret[$i]['type'];
              echo "Статус: $status <br>Вид мероприятия: $typeContest";   
          ?>
        </td>
        <td>
          <?php
            $name = $ret[$i]['name'];
            $typeDocument = $ret[$i]['nameDoc'];
            $year = $ret[$i]['year'];
              echo "$name, $typeDocument, $year"; 
              echo "<br><a href={$ret[$i]['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
            } 
          ?>
        </td>
      </tr>
      <tr>
        <?php
          // $ret = $publicPerformance->getPublicPerformance($idStudent);
          // $sql = 'select pp.*, st.name as status, tpp.name as type, td.name as documentType from publicPerformance pp, statusEvent st, typePublicPerformance tpp, typeDocument td where idStudent = :id and pp.idStatus = st.id and pp.idTypePublicPerformance = tpp.id and pp.idDocumentType = td.id';
          // $ret = Yii::$app->db->createCommand($sql)
          //               ->bindValue(':id', Yii::$app->user->identity->id)
          //               ->queryAll();
          $ret = PerformanceCulture::getAll($idStudent);
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>6</td>";
        ?>
        <td><i>Публичное представление</i> произведения литературы или искусства, созданного студентом (в течение 1 последнего года) с указанием названия произведения, места и года представления:</td>
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
            echo "<br><a href={$ret[$i]['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>7</td>
        <td>Систематическое <i>участие</i> студента в проведении (обеспечении проведения) публичной культурно-творческой деятельности воспитательного, пропагандистского характера и иной общественно значимой публичной культурно-творческой деятельности</td>
        <td> 
          <?php
            // $ret = $ktdParticipation->getKtdParticipation($idStudent);
          // $sql = 'SELECT * FROM ktdParticipation WHERE idStudent = :id AND ktdParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          // $ret = Yii::$app->db->createCommand($sql)
          //               ->bindValue(':id', Yii::$app->user->identity->id)
          //               ->queryAll();
          $ret = ParticipationCulture::getAll($idStudent);
              foreach ($ret as $row) {      
                $description = $row['description'];
                $count = $row['count'];
                echo "Количество мероприятий: $count, $description <br>";
                echo "<br><a href={$row[$i]['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
              }         
          ?>
        </td>     
      </tr>
  </table>
</div>

<div class="culture-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?php
     // echo $r1 = Value::getCulture($student->idFacultet, $student->idStudent);
    ?>
    
    <?= $form->field($model, 'r1')->hiddenInput(['value'=>$r1])->label(false) ?>

    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

    <?= $form->field($model, 'idActivity')->hiddenInput(['value'=>'4'])->label(false) ?>
<?php
if ($test != 0){ ;?>
 <?php if($value == 1){ 
              Yii::$app->session->setFlash('success', 'Заявка отправлена.');
          }?>
<?php
} 
else {?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  <?php 
}
?>
    <?php ActiveForm::end(); ?>

</div>
