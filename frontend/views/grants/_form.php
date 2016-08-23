<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

use common\models\TypeContest;
use common\models\ScienceDirection;
use common\models\GrantType;
use common\models\StatusEvent;
use common\models\EventLevel;
/* @var $this yii\web\View */
/* @var $model common\models\Grants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grants-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nameProject')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>
    
    <?= $form->field($model, 'nameOrganization')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?php echo $form->field($model, 'typeGrant')
                ->radioList(ArrayHelper::map(GrantType::find()->all(), 'id', 'name')); ?>

    <?= $form->field($model, 'dateBegin')->widget(
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

    <?= $form->field($model, 'dateEnd')->widget(
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
    <?= $form->field($model, 'regNumberCitis')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'regNumber')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idTypeContest')->dropDownList(
        ArrayHelper::map(TypeContest::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид конкурса',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'idScienceDirection')->dropDownList(
        ArrayHelper::map(ScienceDirection::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите направление',
                'style'=>'width:500px',
            ]); 
    ?>
    
    <?= $form->field($model, 'idStatus')->dropDownList(
        ArrayHelper::map(StatusEvent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус мероприятия',
                'style'=>'width:300px',
            ]); 
    ?>

    <?= $form->field($model, 'idLevel')->dropDownList(
        ArrayHelper::map(EventLevel::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите уровень мероприятия',
                'style'=>'width:300px',
            ]); 
    ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
