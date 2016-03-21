<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ParticipationCulture */
$all = urldecode('index.php?r=site/activities'); 
$kr = urldecode('index.php?r=participation-culture/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Добавление достижения';
$this->params['breadcrumbs'][] = ['label' => 'Культурно-творческая деятельность', 'url' => $kr];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participation-culture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
