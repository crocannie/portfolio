<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$all = urldecode('index.php?r=site/activities'); 

$this->title = 'Научно-исследовательская деятельность';
$this->params['breadcrumbs'][] = $this->title;
$ur = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$nir = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$or = urldecode('index.php?r=achievements-social/index&id='.Yii::$app->user->identity->id); 
$kr = urldecode('index.php?r=achievements-culture/index&id='.Yii::$app->user->identity->id); 
$sr = urldecode('index.php?r=achievements-sport/index&id='.Yii::$app->user->identity->id);?>
<div class="patents-index">
<?php 
    $grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
    $patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 
    $articles = urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id); 
    $participation = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id); 
?>
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li><a href=<?=$ur?>>Учебная деятельность</a></li>
                <li class="active"><a href=<?=$nir?>>Научно-исследовательская деятельность</a></li>
                <li><a href=<?=$or?>>Общественная деятельность</a></li>
                <li><a href=<?=$kr?>>Культурно-творческая деятельность</a></li>
                <li><a href=<?=$sr?>>Спортивная деятельность</a></li>
            </ul>
        </div>  

        <div class="col-lg-6">  
            <ul class="nav nav-tabs">
              <li><a href=<?=$grants?>>Гранты</a></li>
              <li class="active"><a href=<?=$patents?>>Патенты</a></li>
              <li><a href=<?=$articles?>>Публикации</a></li>
              <li><a href=<?=$participation?>>Участия</a></li>
            </ul><br>
            
            <p><?= Html::a('Добавить патент', ['create'], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',
                    // 'idTypePatent',
                    'copyrightHolder',
                    // 'description',
                    // 'status',
                    // 'dateApp',
                    // 'dateReg',
                    // 'regNumber',
                    // 'appNumber',
                    // 'idDocument',
                    // 'idStudent',
                    // 'location',

                    ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width: 70px;']],
                ],
            ]); ?>
        </div>
    </div>
</div>
