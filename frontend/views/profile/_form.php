<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\models\Cities;
use frontend\models\Universities;
use frontend\models\Facultet;
use frontend\models\Napravlenie;
use frontend\models\Group;
use common\models\User;
use common\models\EducationLevel;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">

<div class="students-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'secondName')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'midleName')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idCity')->dropDownList(
        ArrayHelper::map(Cities::find()->all(), 'id', 'name'), 
            [
                'style'=>'width:500px',
                'onchange'=>'
                    $.post("index.php?r=universities/lists&id='.'"+$(this).val(), function(data)
                        {$("select#students-iduniversity").html(data);}
                    );'
            ]); 
    ?>

    <?= $form->field($model, 'idUniversity')->dropDownList(
        ArrayHelper::map(Universities::find()->all(), 'id', 'name'),
            [
                'style'=>'width:500px',
                'onchange'=>'
                    $.post("index.php?r=facultet/lists&id='.'"+$(this).val(), function(data){
                        $("select#students-idfacultet").html(data);
                        $("select#students-idfacultet").change();
                    });'
            ]); 
    ?>

    <?= $form->field($model, 'idFacultet')->dropDownList(
        ArrayHelper::map(Facultet::find()->all(), 'id', 'name'), 
            [
                'style'=>'width:500px',
                'onchange'=>'
                    $.post("index.php?r=napravlenie/lists&id='.'"+$(this).val(), function(data){
                        $("select#students-idnapravlenie").html(data);
                        $("select#students-idnapravlenie").change();
                    });'
            ]); 
    ?>

    <?= $form->field($model, 'idNapravlenie')->dropDownList(
        ArrayHelper::map(Napravlenie::find()->all(), 'id', 'name'), 
            [
                'style'=>'width:500px',
                'onchange'=>'
                    $.post("index.php?r=group/lists&id='.'"+$(this).val(), function(data){
                        $("select#students-idgroup").html(data);
                        $("select#students-idgroup").change();
                    });'
            ]); 
    ?>

    <?= $form->field($model, 'idGroup')->dropDownList(
        ArrayHelper::map(Group::find()->all(), 'id', 'name'), 
            [
                'style'=>'width:500px',
            ]); ?>

    <?= $form->field($model, 'idLevel')->dropDownList(
        ArrayHelper::map(EducationLevel::find()->all(), 'id', 'name'), 
            [
                'style'=>'width:500px',
            ]); ?>

<?php
    $student = Yii::$app->user->identity->id;
?>
    <?= $form->field(User::findOne($student), 'email')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
