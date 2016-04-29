<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use common\models\TypeSocialParticipation;
use common\models\StatusEvent;
use common\models\EventLevel;
use common\models\TypeParticipant;
/* @var $this yii\web\View */
/* @var $model common\models\AchievementsSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-social-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'idSocialParticipationType')->dropDownList(
        ArrayHelper::map(TypeSocialParticipation::find()->all(), 'id', 'id'), 
            [                        
                'prompt'=>'Выберите вид участия',
                'style'=>'width:300px',
            ]); 
    ?>
    <table>
        <?php
            $type = TypeSocialParticipation::find()->all();
            foreach ($type as $row) {
        ?>
        <tr>
            <td><?= $row['id']?></td>
            <td style="width:1000px;"><?= $row['name']?></td>
        </tr>
        <?php } ?>
    </table><br>
    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true, 'style'=>'width:100px','type' => 'number']) ?>
    
    <?= $form->field($model, 'idStatus')->dropDownList(
        ArrayHelper::map(StatusEvent::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите статус мероприятия',
                'style'=>'width:300px',
            ]); 
    ?>

    <?= $form->field($model, 'idLevel')->dropDownList(
        ArrayHelper::map(EventLevel::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите уровень мероприятия',
                'style'=>'width:300px',
            ]); 
    ?>

    <?= $form->field($model, 'idTypeParticipant')->dropDownList(
        ArrayHelper::map(TypeParticipant::find()->all(), 'id', 'name'), 
            [                        
                'prompt'=>'Выберите вид участия',
                'style'=>'width:300px',
            ]); 
    ?>

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
            'inline' => true,     
            'language' => 'ru',
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-d'
            ],
    ]);?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'idStudent')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>