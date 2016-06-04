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
use common\models\rating\Sport;
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

  $st = Student::getStatus($idStudent, 5);
  $cnt = Student::getCount($idStudent, 5);

  foreach ($st as $row) {
    $value = $row['status'];
  }

  foreach ($cnt as $row) {
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
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li class="active"><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
  <?php } ?>

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
              $a = Student::find()->where(['idStudent'=>$idStudent])->andwhere(['idActivity'=>5])->all();
              foreach($a as $row){echo $row['mark'];}
          } else {;?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
            <?php }?>
       </td>
      </tr>
        <?php
          // $ret = $achievementsSport->getAchievementsSport($idStudent);
          $sql = 'SELECT asp.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsSport asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idTypeContest = tc.id and asp.idDocumentTYpe = td.id AND asp.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
        // $ret = AchievementsSport::getAll($idStudent);
          $rowspan = 1 + (count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>        <td>Получение <i>награды (приза)</i> за результаты спортивной деятельности (в течение 2 последних лет)</td>
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
              echo "<br><a href={$ret[$i]['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
            } 
          ?>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Систематическое <i>участие</i> студента в спортивных мероприятиях воспитательного, пропагандистского характера и (или) иных общественно значимых спортивных мероприятиях</td>
        <td> 
          <?php
            // $ret = $sportParticipation->getSportParticipation($idStudent);
            $sql = 'SELECT * FROM `sportParticipation` WHERE idStudent = :id AND sportParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
            $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', Yii::$app->user->identity->id)
                        ->queryAll();
        // $ret = ParticipationSport::getAll($idStudent);
              foreach ($ret as $row) {      
                $description = $row['description'];
                $count = $row['count'];
                echo "Количество мероприятий: $count, $description <br>";
                echo "<br><a href={$row['location']}><i class='glyphicon glyphicon-file'></i></a><br>";
              }         
          ?>
        </td>     
      </tr>
    </table>
    </div>

<div class="sport-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?php
      $r1 = Value::getSport($student->idFacultet, $student->idStudent);
    ?>
    <?= $form->field($model, 'r1')->hiddenInput(['value'=>$r1])->label(false) ?>

    <?= $form->field($model, 'idActivity')->hiddenInput(['value'=>'5'])->label(false) ?>

    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

<?php
if ($test != 0){ ;?>
<?php 
            if($value == 1){ 
              Yii::$app->session->setFlash('success', 'Заявка отправлена.');
          }?>
<?php
} 
else {
  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  <?php 
}
?>
    <?php ActiveForm::end(); ?>
<?php
echo $r1.'<br>';

       $status = Yii::$app->db->createCommand('
                            select a.name, r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type = Yii::$app->db->createCommand('
                           select a.name, r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idTypeContest
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $doc = Yii::$app->db->createCommand('
                            select a.name, r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level = Yii::$app->db->createCommand('
                            select a.name, r.value, a.year, a.name, a.idLevel, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate()) order by a.id')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        for ($i = 0; $i < count($status); $i++){
          echo $i.' '.'Status: '.$status[$i]['name'].': '.$status[$i]['value'].'<br>';
          echo $i.' '.'Type: '.$type[$i]['name'].': '.$type[$i]['value'].'<br>';
          echo $i.' '.'Doc: '.$doc[$i]['name'].': '.$doc[$i]['value'].'<br>';
          echo $i.' '.'Level: '.$level[$i]['name'].': '.$level[$i]['value'].'<br>';
          echo "<br>";
        }

        $R1 = null;
            for ($i = 0; $i < count($status); $i++){
               echo $R1 += ($status[$i]['value'] * $type[$i]['value'] * $doc[$i]['value'] * $level[$i]['value']);
               echo "<br>";
            }

        $status1 = Yii::$app->db->createCommand('
                            select a.description, r.value, a.date, a.description, a.idStatus, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type1 = Yii::$app->db->createCommand('
                            select a.description, r.value, a.date, a.description, a.idTypeParticipant, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 14
                            and r.idItem = a.idTypeParticipant
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();


        $level1 = Yii::$app->db->createCommand('
                            select a.description, r.value, a.date, a.description, a.idLevel, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

for ($i = 0; $i < count($status1); $i++){
          echo $i.' '.'Status: '.$status1[$i]['description'].': '.$status1[$i]['value'].'<br>';
          echo $i.' '.'Type: '.$type1[$i]['description'].': '.$type1[$i]['value'].'<br>';
          // echo $i.' '.'Doc: '.$doc[$i]['name'].': '.$doc[$i]['value'].'<br>';
          echo $i.' '.'Level: '.$level1[$i]['description'].': '.$level1[$i]['value'].'<br>';
          echo "<br>";
        }
        $R2 = null;                    
        // foreach ($cnt as $row){
        //     $R2 += $row['count']*0.5;
        // }
        for ($i = 0; $i < count($status1); $i++){
            echo $R2 += ($status1[$i]['value'] * $type1[$i]['value']  * $level1[$i]['value']);
        }

?>
</div>
