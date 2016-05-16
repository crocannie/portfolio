<?php

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
	throw new NotFoundHttpException('Страница не найдена.');
}

/* @var $this yii\web\View */
/* @var $model common\models\Students */
$name = ($model->firstName.' '.$model->secondName);
$this->title = 'Редактирование профиля';
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['view', 'id' => $model->idStudent]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
