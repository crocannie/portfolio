<?php

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
	throw new NotFoundHttpException('Страница не найдена.');
}

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Редактирование статьи: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Публикации', 'url' => urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id)];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="articles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
