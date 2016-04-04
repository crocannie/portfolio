<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Sotrudnik;

/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];
$this->params['breadcrumbs'][] = ['label' => 'Направления подготовки', 'url' => urldecode('index.php?r=napravlenie/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="napravlenie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'shifr',
            'name',
            'idFacultet'=>[                    
                    'label'=>'Факультет',
                    'value' => $model->idFacultet0->name,
            ],
        ],
    ]) ?>

</div>
