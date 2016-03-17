<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Научно-исследовательская деятельность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patents-index">

<?php 
    $grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
    $patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 
    $articles = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
?>
    <ul class="nav nav-tabs">
      <li><a href=<?=$grants?>>Гранты</a></li>
      <li class="active"><a href=<?=$patents?>>Патенты</a></li>
      <li><a href=<?=$articles?>>Публикации</a></li>
      <li><a href="#">Участия</a></li>
    </ul><br>

    <h1><?= Html::encode('Патенты') ?></h1>

    <p>
        <?= Html::a('Добавить патент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'idTypePatent',
            'status',
            'copyrightHolder',
            // 'description',
            // 'dateApp',
            // 'dateReg',
            // 'regNumber',
            // 'appNumber',
            // 'idDocument',
            // 'idStudent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
