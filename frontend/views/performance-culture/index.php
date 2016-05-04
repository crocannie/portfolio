<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 

$this->title = 'Культурно-творческая деятельность';
$this->params['breadcrumbs'][] = $this->title;

$ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id); 
$kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
$sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id);?>

<div class="performance-culture-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li><a href=<?=$ur?>>Учебная деятельность</a></li>
                <li><a href=<?=$nir?>>Научно-исследовательская деятельность</a></li>
                <li><a href=<?=$or?>>Общественная деятельность</a></li>
                <li class="active"><a href=<?=$kr?>>Культурно-творческая деятельность</a></li>
                <li><a href=<?=$sr?>>Спортивная деятельность</a></li>
            </ul>
        </div>  

        <div class="col-lg-6">
            <?php 
            $achievements = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
            $performance = urldecode('index.php?r=performance-culture/index&id='.Yii::$app->user->identity->id); 
            $participation = urldecode('index.php?r=participation-culture/index&id='.Yii::$app->user->identity->id); 
            ?>
            <ul class="nav nav-tabs">
              <li><a href=<?=$achievements?>>Награды</a></li>
              <li class="active"><a href=<?=$performance?>>Публичное представление</a></li>
              <li><a href=<?=$participation?>>Участие в мероприятиях</a></li>
            </ul><br>
            <h1><?= Html::encode('Публичное представление') ?></h1>

            <p><?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',
                    // 'idStatus',
                    // 'idTypePublicPerformance',
                    'year'=>[
                            'class' => \yii\grid\DataColumn::className(),
                            'format' => 'html',
                            'label'=>'Дата',
                            'value' => function ($model, $index, $widget) {
                                return $model->year;},
                            'contentOptions'=>['style'=>'width: 100px;']
                    ],                              // 'idDocumentType',
                    // 'idDocument',
                    // 'idStudent',
                    // 'location',

                    ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width: 70px;']],
                ],
            ]); ?>
        </div>
    </div>
</div>
