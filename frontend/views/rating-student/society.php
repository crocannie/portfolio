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
use common\models\AchievementsStudy;
use common\models\rating\Social;
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

  $status = Student::getStatus($idStudent, 3);
  $count = Student::getCount($idStudent, 3);

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
    <h2><?= Html::encode('Направления деятельности') ?></h2>
    <ul class="nav nav-tabs">
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li class="active"><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
  <?php } ?>

<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>общественной</b> деятельности</FONT></p>

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
              $a = Student::find()->where(['idStudent'=>$idStudent])->andwhere(['idActivity'=>3])->all();
              foreach($a as $row){echo $row['mark'];}
          } else {;?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
            <?php }?>
      </tr>

      <tr>
        <td>5</td>
        <td>Систематическое <i>участие</i> студента в проведении (обеспечении проведения) социально ориентированной, культурной (культурно-просветительской, культурно-воспитательной) деятельности в форме шефской помощи, благотворительных акций и иных подобных формах</td>
        <td>
          <?php
              $sql = 'SELECT *  FROM socialParticipation  WHERE idStudent = :id';
              $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $idStudent)
                            ->queryAll();
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 1){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}"; 
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Систематическое <i>участие</i> студента в проведении (обеспечении проведения) общественной деятельности, направленной на пропаганду общечеловеческих ценностей, уважения к правам и свободам человека, а также на защиту природы</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 2){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>7</td>
        <td>Систематическое <i>участие</i> студента в проведении (обеспечении проведения) общественно значимых культурно-массовых мероприятий</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 3){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Систематическое <i>участие</i> студента в деятельности по информационному обеспечению общественно значимых мероприятий, общественной жизни учреждения высшего профессионального образования (в разработке сайта учреждения высшего профессионального образования, организации и обеспечении деятельности средств массовой информации, в том числе в издании газеты, журнала, создании и реализации теле- и радиопрограмм учреждения высшего профессионального образования)</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 4){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>9</td>
        <td><i>Участие (членство)</i> студента в общественных организациях (в течение 1 последнего года)</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 5){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";

                }
              }
          ?>          
        </td>
      </tr>
      <tr>
        <td>10</td>
        <td>Систематическое <i>участие</i> студента в обеспечении защиты прав студентов</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 6){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";
                }
              }
          ?>  
        </td>
      </tr>
      <tr>
        <td>11</td>
        <td>Систематическое безвозмездное <i>выполнение</i> студентом общественно полезной деятельности, в том числе организационной, направленной на поддержание общественной безопасности, благоустройство окружающей среды, природоохранной деятельности или иной аналогичной деятельности</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 7){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                  echo "<br><a href={$row['location']}>Просмотр</a><br>";

                }
              }
          ?>  
        </td>
      </tr>
    </table>

  <div class="social-create">
    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?php $r1 = Value::getSociety($student->idFacultet, $student->idStudent); ?>
    <?= $form->field($model, 'r1')->hiddenInput(['value'=>$r1])->label(false) ?>
    <?= $form->field($model, 'idActivity')->hiddenInput(['value'=>'3'])->label(false) ?>
    <?php if ($test != 0){ ;?>
        <div class="alert alert-info" style="width: 300px; text-align: center; height: 50px">
          <h4>
            Заявка <?php if($value == 1){ echo "отправлена"; }?>
          </h4>
        </div>
    <?php } else { ?>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
  </div>
</div>