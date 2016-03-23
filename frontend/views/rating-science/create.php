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
  $status = Science::getStatus($idStudent);
  $count = Science::getCount($idStudent);

  echo 'getStatus: '.Science::getStatus($idStudent).'<br>';
  echo 'getCount: '.Science::getCount($idStudent).'<br>';

foreach ($count as $count) {
  echo $count['countS'];
}
  if ($status != 0){
    echo "Записе   есть";
      foreach ($status as $row){
        echo 'Есть записи';?>
        <div class="alert alert-success" style="width: 200px; text-align: center; height: 50px">
          <h4>Заявка отправлена</h4>
        </div>
  <?php }
  }{
    echo "Записей нет";
  }
?>
    <table  width="1000" border="1">
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
        <td>    
          <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
             <?= $form->field($model, 'mark')->textInput(['style'=>'width:500px'])->label(false)  ?>
    	 </td>
      </tr>
      <tr>
        <?php 
          $date = strtotime('-2 years');
          $grants = Grants::find()
                            ->where(['idStudent'=>Yii::$app->user->identity->id])
                            ->andWhere(['between', 'dateBegin',  date('Y-m-d', $date), date('Y-m-d')])
                            ->all();
          $patents = Patents::find()
                            ->where(['idStudent'=>Yii::$app->user->identity->id])
                            ->andWhere(['between', 'dateApp',  date('Y-m-d', $date), date('Y-m-d')])
                            ->all();
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
                  $articles = Articles::getType($idStudent);
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
          $ret = AchievementsStudy::getAll($idStudent);
          // $ret = Yii::$app->db->createCommand('SELECT asp.*, asp.dateEvent, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievements asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.idStatus = se.id and asp.idEventType = tc.id and asp.idDocumentTYpe = td.id')
          //                   ->bindValue(':id', Yii::$app->user->identity->id)
          //                   ->queryAll();
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
<div class="science-create">

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>$idStudent])->label(false) ?>

    <?= $form->field($model, 'r1')->hiddenInput(['value'=>Science::getR1($idStudent)])->label(false) ?>

    <?= $form->field($model, 'r2')->hiddenInput(['value'=>Science::getR2($idStudent)])->label(false) ?>

    <?= $form->field($model, 'r3')->hiddenInput(['value'=>Science::getR3($idStudent)])->label(false) ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>

    <div class="alert alert-success" style="width: 200px; text-align: center; height: 50px">
      <h4>Ваш рейтинг: <?php 
          echo Science::getR1($idStudent) + Science::getR2($idStudent) + Science::getR3($idStudent);
        ?>
      </h4>
    </div>
<?php
if ($status != 0){ 
  echo "Записи есть";
} 
else { 
  echo 'Записи нет';?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  <?php 
}
?>
    <?php ActiveForm::end(); ?>

</div>
