<?php

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
	throw new NotFoundHttpException('Страница не найдена.');
}


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
