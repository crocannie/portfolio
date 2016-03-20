<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Культурно-творческая деятельность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-culture-index">
<?php 
    $achievements = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
    $performance = urldecode('index.php?r=performance-culture/index&id='.Yii::$app->user->identity->id); 
    $participation = urldecode('index.php?r=participation-culture/index&id='.Yii::$app->user->identity->id); 
?>
    <ul class="nav nav-tabs">
      <li class="active"><a href=<?=$achievements?>>Награды</a></li>
      <li><a href=<?=$performance?>>Публичное представление</a></li>
      <li><a href=<?=$participation?>>Участие в мероприятиях</a></li>
    </ul><br>
    <h1><?= Html::encode('Награды') ?></h1>

    <p>
        <?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'idStatus'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Статус мероприятия',
                    'value' => function ($model, $index, $widget) {
                        return $model->idStatus0->name ;},
            ],
            'idTypeContest'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Вид мероприятия',
                    'value' => function ($model, $index, $widget) {
                        return $model->idTypeContest0->name ;},
            ],
            'year',
            // 'idDocumentType',
            // 'idDocument',
            'idStudent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
