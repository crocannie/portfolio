<?php

use yii\helpers\Html;
use common\models\Sotrudnik;
use frontend\models\Napravlenie;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}

/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Добавить группу';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => urldecode('index.php?r=sgroup/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgroup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
