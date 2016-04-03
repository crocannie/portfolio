<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\Sotrudnik;
use common\models\Sgroup;
use frontend\models\Napravlenie;

/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
/* @var $form yii\widgets\ActiveForm */

	$id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $napravlenie = Napravlenie::find()->where(['idFacultet'=>$idFacultet])->all();
?>

<div class="sgroup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'width:500px']) ?>
                
	<?= $form->field($model, 'idNapravlenie')->dropDownList(
		 ArrayHelper::map(Napravlenie::find()->where(['idFacultet'=>$idFacultet])->all(), 'id',
			function($model, $defaultValue) {
				return $model['shifr'].'. '.$model['name'];
				}
			),
		 [                        
		 	'prompt'=>'Выберите направление',
			'style'=>'width:500px'
		 ]
		);
	?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
