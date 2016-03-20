<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SocialParticipation */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Social Participations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-participation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idSocialParticipationType',
            'description',
            'count',
            'idDocument',
            'idStudent',
        ],
    ]) ?>

</div>
