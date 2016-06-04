<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Students;
use yii\db\Command;
use common\models\rating\Culture;
use common\models\StatusEvent;
use common\models\rating\Rating;
// use kartik\grid\GridView;
// use kartik\editable\Editable;
use yii\widgets\Pjax;
use common\models\Sotrudnik;
use yii\web\NotFoundHttpException;
use common\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Url;
// use kartik\grid\ActionColumn;

// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Студенты';
// $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = 'Деканат';

$group = urldecode('index.php?r=sgroup/index&id='.$idFacultet); 
$napravlenie = urldecode('index.php?r=napravlenie/index&id='.$idFacultet); 
$anket = urldecode('index.php?r=rating-student/index&id='.$idFacultet); 
$student = urldecode('index.php?r=student/index&id='.$idFacultet); 
?>
<div class="students-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li><a href=<?=$napravlenie?>></i>Направления подготовки</a></li>
                <li><a href=<?=$group?>></i>Группы </a></li>
                <li class="active"><a href=<?=$student?>></i>Студенты</a></li>
            </ul>
            <p><?= Html::button('Установить сроки', ['value'=>Url::to('index.php?r=date/update&id='.$idFacultet),'class' => 'btn btn-primary', 'id'=>'modalButton', 'style'=>"width: 200px; background: white; color: #337AB7; border: white; text-align: left; margin-left: 5px"]) ?></p>       
            <?php
                Modal::begin([
                        'header'=>'<h3>Установить сроки</h3>',
                        'id'=>'modal',
                        'size'=>'modal-sm',
                    ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
            ?>
        </div>

        <div class="col-lg-9">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    // 'idStudent',
                    'secondName',
                    'firstName',
                    'midleName',
                    // 'idCity',
                    // 'idUniversity',
                    // 'idFacultet',
                    'idNapravlenie'=>[
                        'class' => \yii\grid\DataColumn::className(),
                        'format' => 'html',
                        'label'=>'Направление подготовки',
                        'value' => function ($model, $index, $widget) {
                        return $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name ;},
                    ],
                    // 'idGroup'=>[
                    //     'class' => \yii\grid\DataColumn::className(),
                    //     'format' => 'html',
                    //     'label'=>'Группа',
                    //     'value' => function ($model, $index, $widget) {
                    //     return $model->idGroup0->name;},
                    // ],
                    [
                        'attribute'=>'idGroup',
                        'label'=>'Группа',
                        'value' => function ($model, $index, $widget) {
                        return $model->idGroup0->name;},
                    ],
                    // 'email:email',
                    // 'password',
                    // 'registrationCode',
                    // 'login',
                    // 'status',
                    ['class' => 'yii\grid\ActionColumn','template'=>'{view}','contentOptions'=>['style'=>'max-width: 30px;']],
                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
         </div>
    </div>
</div>