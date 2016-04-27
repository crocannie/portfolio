<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

use common\models\StatusEvent;
use common\models\EventType;
use common\models\TypeDocument;



/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-study-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?php
        $beginYear = 1999;
        $currentYear =  date("Y");
        $arrYears = array();
        $i = date("Y");
            while ($beginYear < $currentYear) {
                $arrYears[$i] = $currentYear;
                $currentYear--;
                $i--;
            }
        echo $form->field($model, 'dateEvent')->dropDownList($arrYears,[
            'prompt'=>'Выберите год',
            'style'=>'width:500px']);
    ?>
    <?= $form->field($model, 'idEventType')->dropDownList(
        ArrayHelper::map(EventType::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус',
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

    <?= $form->field($model, 'eventTitle')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idDocumentType')->dropDownList(
        ArrayHelper::map(TypeDocument::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус',
                'style'=>'width:500px',
            ]); 
    ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
