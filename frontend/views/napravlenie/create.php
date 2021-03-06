<?php

use yii\helpers\Html;
use common\models\Sotrudnik;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}

/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */	
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Добавить направление';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];

$this->params['breadcrumbs'][] = ['label' => 'Направления подготовки', 'url' => urldecode('index.php?r=napravlenie/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="napravlenie-create">

    <h4><?= Html::encode('Факультет: '.$sotrudnik->idFacultet0->name) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
