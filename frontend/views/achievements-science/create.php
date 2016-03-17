<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */
$all = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

$this->title = 'Добавление достижения';
$this->params['breadcrumbs'][] = ['label' => 'Учебная деятельность', 'url' => $all];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-study-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
