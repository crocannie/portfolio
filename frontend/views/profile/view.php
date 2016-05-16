<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Students;
use yii\web\NotFoundHttpException;
use common\models\User;
use common\models\Sotrudnik;

if ((Yii::$app->user->isGuest) or (User::isSotrudnik(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}


/* @var $this yii\web\View */
/* @var $model common\models\Students */
//Yii::$app->user->identity->id
//$model = new Students();
// $model->findModel(Yii::$app->user->identity->id);
//$model->getId();

$name = ($model->firstName.' '.$model->secondName);
$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->idStudent], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'secondName',
            'firstName',
            'midleName',
            'idCity'=>[
                    'label'=>'Город',
                    'value' => $model->idCity0->name,
            ],
            'idUniversity'=>[
                    'label'=>'Учебное заведение',
                    'value' => $model->idUniversity0->name,
            ],
            'idFacultet'=>[
                    'label'=>'Факультет',
                    'value' => $model->idFacultet0->name,
            ],
            'idNapravlenie'=>[
                    'label'=>'Направление',
                    'value' => $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name,
            ],
            'idGroup'=>[
                    'label'=>'Группа',
                    'value' => $model->idGroup0->name,
            ],
            'idLevel'=>[
                    'label'=>'Степень',
                    'value' => $model->idLevel0->name,
            ],
/*          'password',
            'registrationCode',
            'login',
            'status',*/
        ],        
        //'options' => ['style' => 'width:300px;'],

    ]) ?>

</div>
