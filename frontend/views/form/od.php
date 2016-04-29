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
	    $nid = urldecode('index.php?r=form/nid&id='.Yii::$app->user->identity->id); 
	    $od = urldecode('index.php?r=form/od&id='.Yii::$app->user->identity->id); 
      $ktd = urldecode('index.php?r=form/ktd&id='.Yii::$app->user->identity->id); 
      $sd = urldecode('index.php?r=form/sd&id='.Yii::$app->user->identity->id); 

	?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$ud?>>Учебная </a></li>
      <li><a href=<?=$nid?>>Начуно-исследовательская </a></li>
      <li class="active"><a href=<?=$od?>>Общественная </a></li>
      <li><a href=<?=$ktd?>>Культурно-творческая </a></li>
      <li><a href=<?=$sd?>>Спортивная </a></li>
    </ul><br>
      
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br />   на получение повышенной стипендии за достижения студента <br /> в <b>общественной</b> деятельности</FONT></p>
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
        <td>5</td>
        <td>Систематическое участие студента в проведении (обеспечении проведения) социально ориентированной, культурной (культурно-просветительской, культурно-воспитательной) деятельности в форме шефской помощи, благотворительных акций и иных подобных формах</td>
        <td>
          <?php
              $sql = 'SELECT *  FROM socialParticipation  WHERE idStudent = :id';
              $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', Yii::$app->user->identity->id)
                            ->queryAll();
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 1){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Систематическое участие студента в проведении (обеспечении проведения) общественной деятельности, направленной на пропаганду общечеловеческих ценностей, уважения к правам и свободам человека, а также на защиту природы</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 2){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>7</td>
        <td>Систематическое участие студента в проведении (обеспечении проведения) общественно значимых культурно-массовых мероприятий</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 3){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Систематическое участие студента в деятельности по информационному обеспечению общественно значимых мероприятий, общественной жизни учреждения высшего профессионального образования (в разработке сайта учреждения высшего профессионального образования, организации и обеспечении деятельности средств массовой информации, в том числе в издании газеты, журнала, создании и реализации теле- и радиопрограмм учреждения высшего профессионального образования)</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 4){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>9</td>
        <td>Участие (членство) студента в общественных организациях (в течение 1 последнего года)</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 5){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>          
        </td>
      </tr>
      <tr>
        <td>10</td>
        <td>Систематическое участие студента в обеспечении защиты прав студентов</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 6){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>  
        </td>
      </tr>
      <tr>
        <td>11</td>
        <td>Систематическое безвозмездное выполнение студентом общественно полезной деятельности, в том числе организационной, направленной на поддержание общественной безопасности, благоустройство окружающей среды, природоохранной деятельности или иной аналогичной деятельности</td>
        <td>
          <?php
              foreach ($ret as $row) {
                if ($row['idSocialParticipationType'] == 7){    
                  echo "Количество мероприятий: {$row['count']} <br> {$row['description']}";  
                }
              }
          ?>  
        </td>
      </tr>
    </table>