<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Sotrudnik;


/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Направления подготовки';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="napravlenie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить направление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'shifr',
            'name',
            // 'idFacultet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
