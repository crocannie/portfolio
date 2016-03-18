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
        // 'brandLabel' => Html::img('/advanced/frontend/views/layouts/logo.png', ['alt'=>Yii::$app->name]),
        // 'brandLabel' => '<img src= "/advanced/frontend/views/layouts/logo.png" hspace="0" vspace="-100">',
       // 'brandLabel' => Html::img('@web/logo.jpg', ['alt'=>Yii::$app->name]),


        'brandLabel' => 'Портфолио',

        // 'brandLabel' => '<img src="/advanced/frontend/views/layouts/logo.png" />'.(Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);?>
    <?php
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'О системе', 'url' => ['/site/about']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
        //$menuItems[] = ['label' => 'Личный кабинет', 'url' => ['/site/login']];
    } else {
        // $menuItems[] = ['label' => 'Личный кабинет', 'url' => urldecode('index.php?r=student/view&id='.Yii::$app->user->identity->id)];
        $menuItems[] = ['label' => 'Личный кабинет', 'url' => urldecode('index.php?r=profile/view&id='.Yii::$app->user->identity->id)];
        $menuItems[] = '<li>'
        // <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Добавить</a></li>
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