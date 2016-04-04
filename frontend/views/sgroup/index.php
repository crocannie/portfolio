<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Sotrudnik;
use common\models\Students;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = 'Группы';
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sgroup-index">

    <h3><?= Html::encode('Факультет: '.$sotrudnik->idFacultet0->name) ?></h3>

    <p>
        <?= Html::a('Добавить группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'idNapravlenie'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Направление подготовки',
                    'value' => function ($model, $index, $widget) {
                        return $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name ;},
            ],
            'count'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                    'label'=>'Количество студентов',
                    'value' => function ($model, $index, $widget) {
                        return count(Students::find()->where(['idGroup'=>$model->id])->all());},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
