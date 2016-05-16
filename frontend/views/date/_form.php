<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
// use dosamigos\datepicker\DatePicker;
use common\models\Sotrudnik;

/* @var $this yii\web\View */
/* @var $model app\models\Date */
/* @var $form yii\widgets\ActiveForm */
	$id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
?>

<div class="date-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'idFacultet')->hiddenInput(['value'=>$idFacultet])->label(false) ?>

 <?= $form->field($model, 'to')->widget(
    	DatePicker::className(), [
        // 'name' => 'dp_2',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => '',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
?>
 <?= $form->field($model, 'from')->widget(
    	DatePicker::className(), [
        // 'name' => 'dp_2',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => '',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
