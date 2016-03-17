<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Patents */
$patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Патенты', 'url' => $patents];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'title'=>'Удалить',
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
            'name',
            'idTypePatent'=>[                    
                    'label'=>'Тип',
                    'value' => $model->idTypePatent0->name,
            ],
            'status',
            'copyrightHolder',
            'description',
            'dateApp',
            'dateReg',
            'regNumber',
            'appNumber',
            // 'idDocument',
            // 'idStudent',
        ],
    ]) ?>

</div>
