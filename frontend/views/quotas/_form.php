<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Quotas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cnt')->textInput(['maxlength' => true, 'style'=>'width:100px','type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
