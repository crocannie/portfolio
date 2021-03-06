<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Sotrudnik;

/* @var $this yii\web\View */
/* @var $model frontend\models\Napravlenie */
/* @var $form yii\widgets\ActiveForm */
 
	$id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
?>

<div class="napravlenie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shifr')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
