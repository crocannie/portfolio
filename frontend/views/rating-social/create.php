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


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 
$this->params['breadcrumbs'][] = ['label' => 'Достижения', 'url' => $all];

$idStudent = Yii::$app->user->identity->id;
$this->title = 'Заявления-анкеты';

$this->params['breadcrumbs'][] = $this->title;
?><div class="form-index">
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
      <li class="active"><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
    
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
<?php
  $status = Social::getStatus($idStudent);
  $count = Social::getCount($idStudent);

  foreach ($status as $row) {
    $value = $row['status'];
  }

  foreach ($count as $row) {
    $test = $row['countS'];
  }

?>
<table width="1000" border="1">
       <col width="30" valign="top">
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
        <td>5</td>
        <td>Систематическое <i>участие</i> студента в проведении (обеспечении проведения) социально ориентированной, культурной (культурно-просветительской, культурно-воспитательной) деятельности в форме шефской помощи, благотворительных акций и иных подобных формах</td>
        <td>
          <?php
              $sql = 'SELECT *  FROM socialParticipation  WHERE idStudent = :id';
              $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', Yii::$app->user->identity->id)
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

    <?= $form->field($model, 'r1')->hiddenInput(['value'=>Social::getR1($idStudent)])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>

    <div class="alert alert-success" style="width: 200px; text-align: center; height: 50px">
      <h4>Ваш рейтинг: <?php 
          echo Social::getR1($idStudent);
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
