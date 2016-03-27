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
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li><a href=<?=$od?>>Общественная </a></li>
      <li class="active"><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
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
  $status = Culture::getStatus($idStudent);
  $count = Culture::getCount($idStudent);

  foreach ($status as $row) {$value = $row['status'];}

  foreach ($count as $row) {$test = $row['countS']; }
?>
    <table  width="1000" border="1">
       <col width="30" valign="top">
       <col width="800" valign="top">
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
          // $ret = $achievementsKTD->getAchievementsKTD($idStudent);
          // $sql = 'SELECT aktd.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsKTD aktd, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and aktd.idStatus = se.id and aktd.idTypeContest = tc.id and aktd.idDocumentTYpe = td.id';
          $ret = AchievementsCulture::getAll($idStudent);
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
              echo "<br><a href={$ret[$i]['location']}>Просмотр</a><br>";
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
            echo "<br><a href={$ret[$i]['location']}>Просмотр</a><br>";
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
          // $sql = 'SELECT * FROM ktdParticipation WHERE idStudent = :id AND ktdParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          // $ret = Yii::$app->db->createCommand($sql)
          //               ->bindValue(':id', Yii::$app->user->identity->id)
          //               ->queryAll();
          $ret = ParticipationCulture::getAll($idStudent);
              foreach ($ret as $row) {      
                $description = $row['description'];
                $count = $row['count'];
                echo "Количество мероприятий: $count, $description <br>";
                echo "<br><a href={$row[$i]['location']}>Просмотр</a><br>";
              }         
          ?>
        </td>     
      </tr>
  </table>
</div>

<?php
echo "R1: ".Culture::getR1($idStudent)."<br>";
echo "R2: ".Culture::getR2($idStudent)."<br>";
echo "R3: ".Culture::getR3($idStudent)."<br>";?>
<div class="culture-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>

    <?= $form->field($model, 'r1')->hiddenInput(['value'=>Culture::getR1($idStudent)])->label(false) ?>

    <?= $form->field($model, 'r2')->hiddenInput(['value'=>Culture::getR2($idStudent)])->label(false) ?>

    <?= $form->field($model, 'r3')->hiddenInput(['value'=>Culture::getR3($idStudent)])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>

    <div class="alert alert-success" style="width: 200px; text-align: center; height: 50px">
      <h4>Ваш рейтинг: <?php 
          echo Culture::getR1($idStudent) + Culture::getR2($idStudent) + Culture::getR3($idStudent);
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
