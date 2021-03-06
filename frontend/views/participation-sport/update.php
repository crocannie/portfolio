<?php

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
	throw new NotFoundHttpException('Страница не найдена.');
}

/* @var $this yii\web\View */
/* @var $model common\models\ParticipationSport */

$all = urldecode('index.php?r=site/activities'); 
$sr = urldecode('index.php?r=participation-sport/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Редактирование: ' . ' ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Спортивная деятельность', 'url' => $sr];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="participation-sport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
