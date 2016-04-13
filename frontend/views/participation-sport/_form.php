<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\StatusEvent;
use common\models\EventLevel;
use common\models\TypeParticipant;

/* @var $this yii\web\View */
/* @var $model common\models\ParticipationSport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participation-sport-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true, 'style'=>'width:100px','type' => 'number']) ?>
<<<<<<< HEAD
    
    <?= $form->field($model, 'idStatus')->dropDownList(
        ArrayHelper::map(StatusEvent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус мероприятия',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'idLevel')->dropDownList(
        ArrayHelper::map(EventLevel::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите уровень мероприятия',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'idTypeParticipant')->dropDownList(
        ArrayHelper::map(TypeParticipant::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид участия',
                'style'=>'width:500px',
            ]); 
    ?>
=======
>>>>>>> bbf623c70de69fa31bcb16a661fa99f96c0da135

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
            
            // inline too, not bad
            'inline' => true,     
            'language' => 'ru',
           //'size' => 'sm',
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-d'
            ],
    ]);?>

    <?= $form->field($model, 'file')->fileInput() ?>
    
    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
