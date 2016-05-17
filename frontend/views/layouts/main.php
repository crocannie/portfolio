<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Modal;
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

    <link rel="stylesheet" href="/vendor/yiisoft/yii2/to/font-awesome/css/font-awesome.min.css">

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
                          // $all = urldecode('index.php?r=rating-study/create'); 
            $menuItems[] = ['label' => 'Заявления', 'url' => urldecode('index.php?r=rating-student/study')]; 
        }
        if (User::isSotrudnik(Yii::$app->user->identity->email)){
            $sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
            $idFacultet = $sotrudnik->idFacultet0->id;
            $menuItems[] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat') ];
        }
        $menuItems[] = ['label' => 'Личный кабинет <span class="glyphicon glyphicon-plus"></span>', 'url' => urldecode('index.php?r=profile/view&id='.Yii::$app->user->identity->id)];
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
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $menuItems,
    // ]);
    if (Yii::$app->user->isGuest) {
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Регистрация <span class="glyphicon glyphicon-education"></span>',
                        'url'   => ['/site/signup'],
                        'title'=>'Вход'
                    ],
                    [
                        'label' => 'Вход <span class="glyphicon glyphicon-log-in"></span>',
                        'url'   => ['/site/login'],
                        'title'=>'Вход'
                    ],

                ],
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);
    }else {
        if (User::isStudent(Yii::$app->user->identity->email)){
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Студент <span class="glyphicon glyphicon-user"></span>',
                        'url'   => urldecode('index.php?r=profile/view&id='.Yii::$app->user->identity->id),
                        'title'=>'Профиль'
                    ],
                    [
                        'label' => 'Достижения <span class="glyphicon glyphicon-briefcase"></span>',
                        'url'   => urldecode('index.php?r=site/activities')
                    ],
                    [
                        'label' => 'Заявления <span class="glyphicon glyphicon-file"></span>',
                        'url'   => urldecode('index.php?r=rating-student/study')
                    ],
                    [
                        'label' => 'Выход <span class="glyphicon glyphicon-log-out"></span>',
                        'url'   => ['site/logout'],
                        // 'class' => 'btn btn-success', 
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ],
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);
        } else {
            echo Nav::widget([
                'items' => [
                    // [
                    //     'label' => '<span class="glyphicon glyphicon-user"></span> Профиль',
                    //     'url'   => urldecode('index.php?r=profile/view&id='.Yii::$app->user->identity->id),
                    //     'title'=>'Профиль'
                    // ],
                    [
                        'label' => '<span class="glyphicon glyphicon-log-out"></span> Выход',
                        'url'   => ['site/logout'],
                        // 'class' => 'btn btn-success', 
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ],
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);
        }
    }
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


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
