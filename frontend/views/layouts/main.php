<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\PanelMenu;
use yii\bootstrap\Carousel;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use common\models\User;
use common\models\Sotrudnik;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Портфолио',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);?>
    <?php
    $menuItems = [
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        if (User::isStudent(Yii::$app->user->identity->email)){
            $menuItems[] = ['label' => 'Достижения', 'url' => urldecode('index.php?r=site/activities') ];
            $menuItems[] = ['label' => 'Заявления', 'url' => urldecode('index.php?r=rating-study/create')];
        }
        if (User::isSotrudnik(Yii::$app->user->identity->email)){
            $sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
            $idFacultet = $sotrudnik->idFacultet0->id;
            $menuItems[] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat') ];
        }
        $menuItems[] = ['label' => 'Личный кабинет', 'url' => urldecode('index.php?r=profile/view&id='.Yii::$app->user->identity->id)];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход '.Yii::$app->user->identity->id,
                ['class' => 'btn btn-link'],
                ['title'=>'Подсказка']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Портфолио <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
