<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSocial */
$all = urldecode('index.php?r=site/activities'); 
$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);
$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Общественная деятельность', 'url' => $achievements];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'idSocialParticipationType'=>[                    
                    'label'=>'Тип участия',
                    'value' => $model->idSocialParticipationType0->name,
            ],
            'description',
            'count',
            'date',
            // 'idDocument',
            // 'idStudent',
        ],
    ]) ?>

</div>