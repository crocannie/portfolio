<?php
use yii\helpers\Html;
use common\models\TypeSocialParticipation;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSocial */
$all = urldecode('index.php?r=site/activities'); 

$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Добавление достижения';
$this->params['breadcrumbs'][] = ['label' => 'Общественная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-social-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>