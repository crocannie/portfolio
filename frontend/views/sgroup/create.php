<?php

use yii\helpers\Html;
use common\models\Sotrudnik;
use frontend\models\Napravlenie;


/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Добавить группу';
$this->params['breadcrumbs'][] = ['label' => 'Направления подготовки', 'url' => urldecode('index.php?r=sgroup/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
