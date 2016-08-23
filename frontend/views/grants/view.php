<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Grants */

$grants = urldecode('index.php?r=grants/index&id='.Yii::$app->user->identity->id); 
$all = urldecode('index.php?r=site/activities'); 

$this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
$this->title = $model->nameProject;
$this->params['breadcrumbs'][] = ['label' => 'Гранты', 'url' => $grants];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grants-view">

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
            //'id',
            'nameProject',
            'nameOrganization',
            'dateBegin',
            'dateEnd',
            'regNumberCitis',
            'regNumber',
            'typeGrant'=>[                    
                    'label'=>'Вид участия',
                    'value' => $model->idTypegrant0->name,
            ],
            'idStatus'=>[                    
                    'label'=>'Статус мепроприятия',
                    'value' => $model->idStatus0->name,
            ],
            'idLevel'=>[                    
                    'label'=>'Уровень мепроприятия',
                    'value' => $model->idLevel0->name,
            ],
            'idTypeContest'=>[                    
                    'label'=>'Вид конкурса',
                    'value' => $model->idTypeContest0->name,
            ],
            'idScienceDirection'=>[                    
                    'label'=>'Направление науки',
                    'value' => $model->idScienceDirection0->name,
            ],
            // 'idDocument',
            // 'idStudent',
        ],
    ]) ?>
    <label>Файл: </label>
<?php 
    echo "<a href={$model->location}><i class='glyphicon glyphicon-file'></i></a><br>";
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
