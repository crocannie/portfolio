<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use common\models\TypeSocialParticipation;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-social-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'idSocialParticipationType')->dropDownList(
        ArrayHelper::map(TypeSocialParticipation::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид участия',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

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