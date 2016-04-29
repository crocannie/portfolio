<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SocialParticipation */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Create Social Participation';
$this->params['breadcrumbs'][] = ['label' => 'Общественная деятельность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-participation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
