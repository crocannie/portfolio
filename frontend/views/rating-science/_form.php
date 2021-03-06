<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\rating\Science */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="science-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idStudent')->textInput() ?>

    <?= $form->field($model, 'r1')->textInput() ?>

    <?= $form->field($model, 'r2')->textInput() ?>

    <?= $form->field($model, 'r3')->textInput() ?>

    <?= $form->field($model, 'mark')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
