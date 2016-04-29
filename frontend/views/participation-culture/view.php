<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ParticipationCulture */

$all = urldecode('index.php?r=site/activities'); 
$kr = urldecode('index.php?r=participation-culture/index&id='.Yii::$app->user->identity->id); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Культурно-творческая деятельность', 'url' => $kr];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participation-culture-view">

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
            'description',
            'count',
            'date',
            // 'location',
            // 'idDocument',
            // 'idStudent',
        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}>{$model->description}</a><br>";
?>
</div>
