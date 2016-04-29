<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SocialParticipation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-participation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idSocialParticipationType')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'idDocument')->textInput() ?>

    <?= $form->field($model, 'idStudent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
