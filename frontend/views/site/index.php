<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\AchievementsCulture;
use common\models\User;

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
    <h2>Система учета достижений студентов</h2><br>
    <?php if (Yii::$app->user->isGuest) { ?>
    <?php } ?>
  </div>

  <div class="body-content">
    <?php
    if (Yii::$app->user->isGuest) {?>
      <div class="row">
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/film-1.png">
          <h3>Достижения</h3>
          <p>Студент добавляет свои достижения, награды и участия в мероприятиях</p>
        </div>
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/video-player-3.png">
          <h3>Критерия для отбора</h3>
          <p>Деканат устанавливает критерии для расчета рейтингов студентов и сроки подачи заявок</p>
        </div>
        <div align="center" class="col-md-4">
          <img height="180px" src="/portfolio/frontend/web/images/index/webcam1.png">
          ` <h3>Заявления-анкеты</h3>
          <p>Формирование списка стипендиатов на основе внесенной информации</p>
        </div>
      </div>

<?php    } elseif (User::isStudent(Yii::$app->user->identity->email)) { ?>
      <div class="row">
        <div align="center" class="col-md-6">
          <img height="180px" src="/portfolio/frontend/web/images/index/film-1.png">
          <h3>Достижения</h3>
          <p>Добавление достижений, наград и участий в мероприятиях по направлениям деятельности</p>
          <?php   
            $all = urldecode('index.php?r=site/activities'); 
            $ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
            $nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
            $or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id);
            $kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
            $sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id); 
          ?>
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
          <img height="180px" src="/portfolio/frontend/web/images/index/webcam1.png">
           <h3>Заявления-анкеты</h3>
          <p>Подача заявлений на стипендиальное обеспечение по направлениям деятельности</p>
          <?php
            $all = urldecode('index.php?r=rating-student/study'); 
            $ud = urldecode('index.php?r=rating-student/study'); 
            $nid = urldecode('index.php?r=rating-student/science'); 
            $od = urldecode('index.php?r=rating-student/society');    
            $ktd = urldecode('index.php?r=rating-student/culture'); 
            $sd = urldecode('index.php?r=rating-student/sport'); 
          ?>
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
        <div align="center" class="col-md-6">
          <img height="180px" src="/portfolio/frontend/web/images/index/film.png">
          <h3>Деканат</h3>
          <p>Добавление направлений подготовки и групп студентов, просмотр активности учащихся</p>
          <?php   
                $all = urldecode('index.php?r=site/dekanat'); 
                $ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
                $nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
                $or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id);
                $kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
          ?>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$all?>>Деканат</a>
          </div>
      </div>
        <div align="center" class="col-md-6">
          <img height="180px" src="/portfolio/frontend/web/images/index/video-player-3.png">
          <h3>Стипендиальное обеспечение</h3>
          <p>Просмотр отправленных студентами анкет, редактирование критериев для отбора стипендиатов,назначение сроков подачи заявлений</p>
        <?php
              $all = urldecode('index.php?r=rating-study/create'); 
              $ud = urldecode('index.php?r=rating-study/create'); 
              $nid = urldecode('index.php?r=rating-science/create'); 
              $od = urldecode('index.php?r=rating-social/create');    
              $ktd = urldecode('index.php?r=rating-culture/create'); 
              $sd = urldecode('index.php?r=rating-sport/create'); 
        ?>
        <div class="btn-group">
          <a style="width: 305px" class="btn btn-success" href=<?=$all?>>Стипендиальное обеспечение</a>
          <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul style="width: 330px" class="dropdown-menu">
            <li><a href=<?=$ud?>><i class="fa fa-hourglass-half"></i> Сроки подачи заявок</a></li>
            <li><a href=<?=$nid?>><i class="fa fa-briefcase"></i> Заявления студентов</a></li>
            <li><a href=<?=$od?>><i class="fa fa-sliders"></i> Настройка критериев</a></li>
            <li><a href=<?=$ktd?>><i class="fa fa-pie-chart"></i> Рейтинг</a></li>
            <li><a href=<?=$ktd?>><i class="fa fa-file"></i> Документы</a></li>
          </ul>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>