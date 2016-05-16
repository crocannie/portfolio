<?php

use yii\helpers\Html;

use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $model common\models\Quotas */

$this->title = 'Create Quotas';
$this->params['breadcrumbs'][] = ['label' => 'Quotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
