<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'secondName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'midleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCity')->textInput() ?>

    <?= $form->field($model, 'idUniversity')->textInput() ?>

    <?= $form->field($model, 'idFacultet')->textInput() ?>

    <?= $form->field($model, 'idNapravlenie')->textInput() ?>

    <?= $form->field($model, 'idGroup')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registrationCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
