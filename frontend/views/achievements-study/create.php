<?php

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
	throw new NotFoundHttpException('Страница не найдена.');
}


/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

$this->title = 'Добавление достижения';
$this->params['breadcrumbs'][] = ['label' => 'Учебная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-study-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
