<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\AchievementsCulture;
use common\models\User;
use common\models\Sotrudnik;

$this->title = 'Портфолио';
?>          
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/vendor/yiisoft/yii2/to/font-awesome/css/font-awesome.min.css">
  <style>
   .b1 {
    background: navy; /* Синий цвет фона */ 
    font-size: 9pt; /* Размер шрифта в пунктах */
   }
  </style>
<div class="site-index">
  <div class="jumbotron">
    <h2 style="color: #40424F">Система учета достижений студентов</h2>
  </div>

  <div class="body-content">
    <?php
    if (Yii::$app->user->isGuest) {?>
      <div class="row">
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/diplom.png">
          <h3 style="color: #40424F">Достижения</h3><br>
          <p>Студент добавляет свои достижения, награды и участия в мероприятиях</p>
        </div>
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/calc3.png">
          <h3 style="color: #40424F">Критерии внеучебной деятельности</h3>
          <p>Деканат устанавливает критерии для расчета рейтингов студентов и сроки подачи заявок</p>
        </div>
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/spisok.png">
          <h3 style="color: #40424F">Заявления-анкеты</h3><br>
          <p>Система формирует список стипендиатов на основе внесенной информации</p>
        </div>
      </div>

<?php    } elseif (User::isStudent(Yii::$app->user->identity->email)) { ?>
      <div class="row">
        <div align="center" class="col-md-6">
          <?php   
            $all = urldecode('index.php?r=site/activities'); 
            $ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
            $nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
            $or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id);
            $kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
            $sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id); 
          ?>
          <p><a href=<?=$all?>><img height="180px" src="/portfolio/frontend/web/images/index/diplom.png"></a></p>
          <a style="color:#40424F" href="$all"><h3>Достижения</h3></a>
          <p >Добавление достижений, наград и участий в мероприятиях по направлениям деятельности</p>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$all?>>Достижения</a>
            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul style="width: 330px" class="dropdown-menu">
              <li><a href=<?=$ur?>><i class="fa fa-graduation-cap"></i> Учебная деятельность</a></li>
              <li><a href=<?=$nir?>><i class="fa fa-flask"></i> Научно-исследовательская деятельность</a></li>
              <li><a href=<?=$or?>><i class="fa fa-users"></i> Общественная деятельность</a></li>
              <li><a href=<?=$kr?>><i class="fa fa-paint-brush"></i> Культурно-творческая деятельность</a></li>
              <li class="dropdown-submenu"><a href="#"><i class="fa fa-futbol-o"></i> Спортивная деятельность</a></li>            
            </ul>
          </div>
        </div>

        <div align="center" class="col-md-6">
          <?php
            $all = urldecode('index.php?r=rating-student/study'); 
            $ud = urldecode('index.php?r=rating-student/study'); 
            $nid = urldecode('index.php?r=rating-student/science'); 
            $od = urldecode('index.php?r=rating-student/society');    
            $ktd = urldecode('index.php?r=rating-student/culture'); 
            $sd = urldecode('index.php?r=rating-student/sport'); 
          ?>
          <p><a href=<?=$all?>><img height="180px" src="/portfolio/frontend/web/images/index/calendar2.png"></a></p>
          <a style="color: #40424F" href="$all"><h3>Заявления-анкеты</h3></a>
          <p>Подача заявлений на стипендиальное обеспечение по направлениям деятельности</p><br>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$all?>>Заявления-анкеты</a>
            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul style="width: 330px" class="dropdown-menu">
              <li><a href=<?=$ud?>><i class="fa fa-graduation-cap"></i> Учебная деятельность</a></li>
              <li><a href=<?=$nid?>><i class="fa fa-flask"></i> Научно-исследовательская деятельность</a></li>
              <li><a href=<?=$od?>><i class="fa fa-users"></i> Общественная деятельность</a></li>
              <li><a href=<?=$ktd?>><i class="fa fa-paint-brush"></i> Культурно-творческая деятельность</a></li>
              <li><a href=<?=$sd?>><i class="fa fa-futbol-o"></i> Спортивная деятельность</a></li>
            </ul>
          </div>
        </div>
      </div>
  <?php } elseif (User::isSotrudnik(Yii::$app->user->identity->email)) { ?>
    <div class="row">
        <div align="center" class="col-md-4">
            <?php
              $id = Yii::$app->user->identity->id;
              $sotrudnik = Sotrudnik::findOne($id);
              $idFacultet = $sotrudnik->idFacultet0->id;
              $napravlenie = urldecode('index.php?r=napravlenie/index&id='.$idFacultet); 
            ?>
          <p><a href=<?=$napravlenie?>><img height="180px" src="/portfolio/frontend/web/images/index/focus1.png"></a></p>
          <a style="color: #40424F" href=<?=$napravlenie?>><h3>Деканат</h3><br></a>
          <p>Добавление направлений подготовки и групп студентов, просмотр учащихся</p>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$napravlenie?>>Деканат</a>
          </div>
        </div>

        <div align="center" class="col-md-4">
          <?php
                $criterii = urldecode('index.php?r=rating/status&id='.$idFacultet); 
          ?>
          <p><a href=<?=$criterii?>><img height="180px" src="/portfolio/frontend/web/images/index/calc3.png"></a></p>
          <a style="color: #40424F" href=<?=$criterii?>><h3>Критерии внеучебной деятельности</h3></a>
          <p>Редактирование критериев для расчет рейтингов студентов</p>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$criterii?>>Критерии</a>
          </div>
      </div>

        <div align="center" class="col-md-4">
          <?php
            $anket = urldecode('index.php?r=rating-student/index&id='.$idFacultet); 
          ?>
          <p><a href=<?=$anket?>><img height="180px" src="/portfolio/frontend/web/images/index/calendar2.png"></a></p>
          <a style="color: #40424F" href=<?=$anket?>><h3>Стипендиальное обеспечение</h3></a>
          <p>Установка сроков подачи заявлений, просмотр отправленных студентами анкет</p>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$anket?>>Стипендиальное обеспечение</a>
          </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>