<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

use common\models\StatusEvent;
use common\models\EventType;
use common\models\TypeDocument;
use common\models\EventLevel;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-study-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'dateEvent')->widget(
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

    <?= $form->field($model, 'idEventType')->dropDownList(
        ArrayHelper::map(EventType::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'idStatus')->dropDownList(
        ArrayHelper::map(StatusEvent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус',
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

    <?= $form->field($model, 'eventTitle')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idDocumentType')->dropDownList(
        ArrayHelper::map(TypeDocument::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид',
                'style'=>'width:500px',
            ]); 
    ?>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false) ?>

    <?= $form->field($model, 'file')->fileInput()->label('Выбрать новый документ') ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
