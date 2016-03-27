<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 

$this->title = 'Научно-исследовательская деятельность';

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grants-index">
    
<?php 
    $grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
    $patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 
    $articles = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
    $participation = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id); 

?>
    <ul class="nav nav-tabs">
      <li class="active"><a href=<?=$grants?>>Гранты</a></li>
      <li><a href=<?=$patents?>>Патенты</a></li>
      <li><a href=<?=$articles?>>Публикации</a></li>
      <li><a href=<?=$participation?>>Участия</a></li>
    </ul><br>

    <h1><?= Html::encode('Гранты') ?></h1>

    <p>
        <?= Html::a('Добавить грант', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nameProject',
            'nameOrganization',
            'dateBegin',
            'dateEnd',
            // 'regNumberCitis',
            // 'regNumber',
            // 'idTypeContest',
            // 'idScienceDirection',
            // 'idDocument',
            'idStudent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
