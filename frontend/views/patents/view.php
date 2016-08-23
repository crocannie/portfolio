<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Patents */

$patents = urldecode('index.php?r=patents/index&id='.Yii::$app->user->identity->id); 

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Патенты', 'url' => $patents];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php   if (User::isStudent(Yii::$app->user->identity->email)){?>
            <?php if (($model->istatus != 0) and ($model->istatus != 3)){ ?>
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
            'name',
            'idTypePatent'=>[                    
                    'label'=>'Тип патента',
                    'value' => $model->idTypePatent0->name,
            ],
            'copyrightHolder',
            'description',
            'status'=>[                    
                    'label'=>'Статус',
                    'value' => $model->status0->name,
            ],
            'dateApp',
            'dateReg',
            'regNumber',
            'appNumber',
            // 'idDocument',
            // 'idStudent',
            // 'location',
        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}>{$model->name}</a><br>";
?>

<?php   if (User::isSotrudnik(Yii::$app->user->identity->email)){?>

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'istatus')->radioList([
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
