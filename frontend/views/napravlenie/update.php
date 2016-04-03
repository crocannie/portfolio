<?php

use yii\helpers\Html;
use common\models\Sotrudnik;

/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Редактирование направления: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Направления подготовки', 'url' => urldecode('index.php?r=napravlenie/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="napravlenie-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
