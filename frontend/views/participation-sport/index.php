<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Спортивная деятельность';
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Participation Sports';
?>
<div class="participation-sport-index">

<?php 
    $achievements = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id); 
    $participation = urldecode('index.php?r=participation-sport/index&id='.Yii::$app->user->identity->id); 
?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$achievements?>>Награды</a></li>
      <li class="active"><a href=<?=$participation?>>Участие в мероприятиях</a></li>
    </ul><br>
    <h1><?= Html::encode('Награды') ?></h1>

    <p>
        <?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'description',
            'count',
            'date',
            // 'idDocument',
            // 'idStudent',
            'location',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
