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
use common\models\rating\Science;
use common\models\rating\Study;


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
      $ud = urldecode('index.php?r=rating-study/create'); 
    $nid = urldecode('index.php?r=rating-science/create'); 
      $od = urldecode('index.php?r=rating-social/create');    
      $ktd = urldecode('index.php?r=rating-culture/create'); 
      $sd = urldecode('index.php?r=rating-sport/create'); 

	?>
    <ul class="nav nav-tabs">
      <li class="active"><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
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
    <table  width="1000" 	border="1">
       <col width="30" 		valign="top">
       <col width="300" 	valign="top">
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
<tr>
        <?php
          // $ret = $achievement->getAchievement($idStudent);
                 $ret = AchievementsStudy::getAll($idStudent);

          // $ret = Yii::$app->db->createCommand('SELECT asp.*, asp.dateEvent, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievements asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idEventType = tc.id and asp.idDocumentTYpe = td.id')
          //                   ->bindValue(':id', Yii::$app->user->identity->id)
          //                   ->queryAll();

          $rowspan = 4 + (3*count($ret));
          echo "<td rowspan={$rowspan}>5</td>";
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

        //  }
        }
      ?>
	</table>

<?php
  $status = Study::getStatus($idStudent);
  $count = Study::getCount($idStudent);

  foreach ($status as $row) {
    // echo $row['status'];
    // echo $count->countS;
    $value = $row['status'];
  }

  foreach ($count as $row) {
    $test = $row['countS'];
    // echo $count->countS;
  }

  // echo "Количество заявко в таблице НИР:  ".$test.'<br>';
  if ($test != 0){?>
<?php
  }else{
   // echo "Записей нет";
      foreach ($status as $row){
     //   echo ' записи'.$row['countS'];
      }
  }
?>

<div class="study-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>

    <?= $form->field($model, 'r1')->hiddenInput(['value'=>Study::getR1($idStudent)])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>

    <div class="alert alert-success" style="width: 200px; text-align: center; height: 50px">
      <h4>Ваш рейтинг: <?php 
          echo Study::getR1($idStudent);
        ?>
      </h4>
    </div>
	<?php
	if ($test != 0){ ;?>
	        <div class="alert alert-info" style="width: 200px; text-align: center; height: 50px">
	          <h4>
	            Заявка <?php if($value == 1){ echo "отправлена"; }?>
	          </h4>
	        </div>
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
