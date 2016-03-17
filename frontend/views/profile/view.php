<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Students;
/* @var $this yii\web\View */
/* @var $model common\models\Students */
//Yii::$app->user->identity->id
//$model = new Students();
// $model->findModel(Yii::$app->user->identity->id);
//$model->getId();

$name = (Yii::$app->user->identity->firstName.' '.Yii::$app->user->identity->secondName);
$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'secondName',
            'firstName',
            'midleName',
            'idCity',
            'idUniversity',
            'idFacultet',
            'idNapravlenie',
            'idGroup',
            'email:email',
/*          'password',
            'registrationCode',
            'login',
            'status',*/
        ],        
        //'options' => ['style' => 'width:300px;'],

    ]) ?>

</div>
