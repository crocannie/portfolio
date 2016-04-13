<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\TypeArticle;
use common\models\StatusEvent;
use common\models\Authorship;


/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'idType')->dropDownList(
        ArrayHelper::map(TypeArticle::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите тип статьи',
                'style'=>'width:500px',
            ]); 
    ?>

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
        echo $form->field($model, 'year')->dropDownList($arrYears,[
            'prompt'=>'Выберите год',
            'style'=>'width:500px']);
    ?>

    <?= $form->field($model, 'idStatus')->dropDownList(
        ArrayHelper::map(StatusEvent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус',
                'style'=>'width:500px',
            ]); 
    ?>
    <?php echo $form->field($model, 'idAuthorship')
                ->radioList(ArrayHelper::map(Authorship::find()->all(), 'id', 'name')); ?>
    
    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'volumePublication')->textInput(['style'=>'width:100px', 'type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
