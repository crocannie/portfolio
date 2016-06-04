<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\ParticipationSport */

$all = urldecode('index.php?r=site/activities'); 
$sr = urldecode('index.php?r=participation-sport/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Спортивная деятельность', 'url' => $sr];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participation-sport-view">

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
            'description',
            'idStatus'=>[                    
                    'label'=>'Статус мероприятия',
                    'value' => $model->idStatus0->name,
            ],
            'idLevel'=>[                    
                    'label'=>'Уровень мепроприятия',
                    'value' => $model->idLevel0->name,
            ],
            'idTypeParticipant'=>[                    
                    'label'=>'Тип участника',
                    'value' => $model->idTypeParticipant0->name,
            ],
            'count',
            'date',
            // 'idDocument',
            // 'idStudent',
            // 'location',
        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}>{$model->description}</a><br>";
?>
</div>
