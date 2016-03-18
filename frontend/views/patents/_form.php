<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

use common\models\TypePatent;
use common\models\StatusPatent;

/* @var $this yii\web\View */
/* @var $model common\models\Patents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patents-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idTypePatent')->dropDownList(
        ArrayHelper::map(TypePatent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите тип статьи',
                'style'=>'width:500px',
            ]); 
    ?>
    
    <?= $form->field($model, 'copyrightHolder')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'status')->dropDownList(
        ArrayHelper::map(StatusPatent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите тип статьи',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'dateApp')->widget(
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

    <?= $form->field($model, 'dateReg')->widget(
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

    <?= $form->field($model, 'regNumber')->textInput(['style'=>'width:500px']) ?>

    <?= $form->field($model, 'appNumber')->textInput(['style'=>'width:500px']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
