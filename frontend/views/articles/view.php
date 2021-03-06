<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Articles */
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Публикации', 'url' => urldecode('index.php?r=articles/index&id='.Yii::$app->user->identity->id)];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php   if (User::isStudent(Yii::$app->user->identity->email)){?>
            <?php if (($model->status != 0) and ($model->status != 3)){ ?>
                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
            <?php }?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'idType',
            'idType0'=>[                    
                    'label'=>'Вид статьи',
                    'value' => $model->idType0->name,
            ],
            'name',
            'year',
            'statusName'=>[
                    'label'=>'Статус публикации',
                    'value' => $model->idStatus0->name,
            ],
            // 'idStatus',
            'idAuthorship'=>[
                    'label'=>'Соавторство',
                    'value' => $model->idAuthorship0->name,
            ],

             // echo "<a href={$row['location']}>{$row['userFileName']}</a><br>";
             // echo "<a href={$row['location']}>{$row['userFileName']}</a><br>";

            // 'idStudent',
            'volumePublication',
            // 'idDocument'=>[
            //         'label'=>'Соавторство',
            //         'value' =>'<a href={location}download> Скачать файл</a><br>',
            // ],
             //        'label'=>'Док',
             //        'value' => Yii::$app->request->sendFile(basename($file),file_get_contents($file)),
             // ],

        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}>{$model->name}</a><br>";
?>
<?php   if (User::isSotrudnik(Yii::$app->user->identity->email)){?>

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'status')->radioList([
        '0' => 'Принято',
        '2' => 'На редактирование',
    ]);?>
    
    <?= $form->field($model, 'message')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php }?>
</div>