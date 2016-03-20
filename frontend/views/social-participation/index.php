<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$all = urldecode('index.php?r=site/activities'); 

$this->title = 'Общественная деятельность';

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-participation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idSocialParticipationType',
            'description',
            'count',
            'idDocument',
            // 'idStudent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
