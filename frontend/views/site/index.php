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

<div class="site-index">
  <div class="jumbotron">
    <h1>Портфолио</h1>
    <h3>Открытая система учета достижений студентов</h3><br>
    <?php if (Yii::$app->user->isGuest) { ?>
      <p><a class="btn btn-lg btn-success" href=<?= urldecode('index.php?r=/site/signup')?>>Регистрация</a></p>       
    <?php } ?>
  </div>

  <div class="body-content">
    <?php
    if (Yii::$app->user->isGuest) {

    } elseif (User::isStudent(Yii::$app->user->identity->email)) { ?>
    <div class="row">
        <div class="col-lg-6">
            <h2>Достижения</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur.</p>
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

        <div class="col-lg-6">
            <h2>Заявления-анкеты</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur.</p>
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
      <div class="col-lg-6">
        <h2>Деканат</h2>
          <li>Добавление направлений подготовки студентов</li>
          <li>Добавление групп</li>
          <br><br>
          <?php   
                $all = urldecode('index.php?r=site/activities'); 
                $ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
                $nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
                $or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id);
                $kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
          ?>
          <div class="btn-group">
            <a style="width: 305px" class="btn btn-success" href=<?=$all?>>Деканат</a>
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
      <div class="col-lg-6">
        <h2>Стипендиальное обеспечение</h2>
          <li>Просмотр отправленных студентами анкет</li>
          <li>Редактирование критериев для отбора стипендиатов</li>
          <li>Назначение сроков подачи заявлений</li><br>
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
