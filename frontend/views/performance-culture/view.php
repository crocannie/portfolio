<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\PerformanceCulture */
$all = urldecode('index.php?r=site/activities'); 
$kr = urldecode('index.php?r=performance-culture/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Культурно-творческая деятельность', 'url' => $kr];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="performance-culture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php   if (User::isStudent(Yii::$app->user->identity->email)){?>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'idStatus'=>[                    
                    'label'=>'Статус мероприятия',
                    'value' => $model->idStatus0->name,
            ],
            'idLevel'=>[                    
                    'label'=>'Уровень мепроприятия',
                    'value' => $model->idLevel0->name,
            ],
            'idTypePublicPerformance'=>[                    
                    'label'=>'Жанр',
                    'value' => $model->idTypePublicPerformance0->name,
            ],
            'year',
            'idDocumentType'=>[                    
                    'label'=>'Вид полученного документа',
                    'value' => $model->idDocumentType0->name,
            ],
            // 'idDocument',
            // 'idStudent',
            // 'location',
        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}>{$model->name}</a><br>";
?>
</div>
