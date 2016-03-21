<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Grants */

$grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->nameProject;
$this->params['breadcrumbs'][] = ['label' => 'Гранты', 'url' => $grants];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grants-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id],  ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
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
            //'id',
            'nameProject',
            'nameOrganization',
            'dateBegin',
            'dateEnd',
            'regNumberCitis',
            'regNumber',
            'idTypeContest'=>[                    
                    'label'=>'Вид статьи',
                    'value' => $model->idTypeContest0->name,
            ],
            'idScienceDirection'=>[                    
                    'label'=>'Вид статьи',
                    'value' => $model->idScienceDirection0->name,
            ],
            // 'idDocument',
            // 'idStudent',
        ],
    ]) ?>

</div>
