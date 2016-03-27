<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = 'Научно-исследовательская деятельность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

<?php 
    $grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
    $patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 
    $articles = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id);
    $participation = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id); 
?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$grants?>>Гранты</a></li>
      <li><a href=<?=$patents?>>Патенты</a></li>
      <li class="active"><a href=<?=$articles?>>Публикации</a></li>
      <li><a href=<?=$participation?>>Участия</a></li>
    </ul><br>

    <h1><?= Html::encode('Публикации') ?></h1>

    <p>
        <?= Html::a('Добавить публикацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'idType',   
            'name',
            'typeName'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Вид статьи',
                    'value' => function ($model, $index, $widget) {
                        return $model->idType0->name ;},

            ],
            'year',
            //'idStatus',
            // 'idAuthorship',
            // 'idDocument',
            //'idStudent',
            'statusName'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Статус публикации',
                    'value' => function ($model, $index, $widget) {
                        return $model->idStatus0->name ;},
            ],
                        
            // 'volumePublication',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
