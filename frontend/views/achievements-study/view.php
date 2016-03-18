<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */

$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Учебная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-study-view">

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
            //'id',
            'name',
            'dateEvent',
            'idEventType'=>[                    
                    'label'=>'Вид мероприятия',
                    'value' => $model->idEventType0->name,
            ],
            'idStatus'=>[                    
                    'label'=>'Статус мероприятия',
                    'value' => $model->idStatus0->name,
            ],
            'eventTitle',
            'idDocumentType'=>[                    
                    'label'=>'Вид полученного документа',
                    'value' => $model->idDocumentType0->name,
            ],
            //'idDocument',
            //'idStudent',
        ],
    ]) ?>

</div>
