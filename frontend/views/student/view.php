<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $model common\models\Students */

//$this->title = $model->firstName;
$this->title = (Yii::$app->user->identity->firstName.' '.Yii::$app->user->identity->secondName);
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'secondName',
            'firstName',
            'midleName',
            'idCity',
            'idUniversity',
            'idFacultet',
            'idNapravlenie',
            'idGroup',
            'email:email',
            'password',
            'registrationCode',
            'login',
            'status',
        ],
    ]) ?>

</div>
