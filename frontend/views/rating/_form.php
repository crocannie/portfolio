<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Sotrudnik;
use common\models\rating\Rating;
use common\models\StatusEvent;

/* @var $this yii\web\View */
/* @var $model common\models\rating\Rating */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

    <?= $form->field($model, 'idTable')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

    <?= $form->field($model, 'idItem')->hiddenInput()->label(false) ?>
 
    <?= $form->field($model, 'value')->textInput(['style'=>'width:100px'])->label(false) ?>
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
