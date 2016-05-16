
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
use common\models\User;
use common\models\Sotrudnik;
use common\models\AchievementsStudy;
use common\models\rating\Science;
use common\models\rating\Student;
use common\models\rating\Value;
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


  $status = Student::getStatus($idStudent, 1);
  $count = Student::getCount($idStudent, 1);
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
      <li class="active"><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    <?php }?>
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>учебной</b> деятельности</FONT></p>

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
<div class="study-create">
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
              $a = Student::find()->where(['idStudent'=>$idStudent])->andwhere(['idActivity'=>1])->all();
              foreach($a as $row){echo $row['mark'];}
          } else {;?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
            <?php }?>
      </tr>
      
      <tr>
        <?php
          $ret = AchievementsStudy::getAll($idStudent);
          $rowspan = 4 + (3*count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
        ?>
        <td colspan="2"><b>Признание претендента победителем или призером международной, всероссийской олимпиады, конкурса, соревнования, состязания, иного мероприятия, направленного на выявление  учебных  достижений  претендента (в  течение  2  лет,  предшествующих назначению повышенной стипендии):</td>
      </tr>
      <?php
          for ($i = 0; $i < count($ret); $i++){
      ?>
      <tr>
        <td><i>вид мероприятия</i> (конференция, семинар, соревнования)</td>
        <td>
          <?php
            $name = $ret[$i]['name'];
              echo "$name".'<br>';  
              echo "<a href={$ret[$i]['location']}>Просмотр</a><br>";
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

<?php
  if ($test != 0){?>
<?php
  }else{
      foreach ($status as $row){
      }
  }
?>

<div class="study-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?php
      $r1 = Value::getStudy($student->idFacultet, $student->idStudent);
    ?>
    <?= $form->field($model, 'r1')->hiddenInput(['value'=>$r1])->label(false) ?>

    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

    <?= $form->field($model, 'idActivity')->hiddenInput(['value'=>'1'])->label(false) ?>

  <?php
  if ($test != 0){ ;?>
                <?php if($value == 1){ 
                // echo "отправлена"; 
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
</div>
</div>