<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Grants */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 

$this->title = 'Добавление гранта';
$this->params['breadcrumbs'][] = ['label' => 'Гранты', 'url' => $grants];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
