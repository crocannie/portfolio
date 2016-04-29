<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\models\Cities;
use frontend\models\Universities;
use frontend\models\Facultet;
use frontend\models\Napravlenie;
use frontend\models\Group;
//http://www.yiiframework.com/forum/index.php/topic/51216-%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B7%D0%B0%D0%BF%D0%B8%D1%81%D0%B5%D0%B9-%D0%B2-%D0%B4%D0%B2%D0%B5-%D1%82%D0%B0%D0%B1%D0%BB%D0%B8%D1%86%D1%8B-%D1%81-%D0%BE%D0%B4%D0%BD%D0%BE%D0%B9-%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8/
//http://nix-tips.ru/yii2-prostaya-realizaciya-rbac-s-dvumya-rolyami.html
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="dropdownlist/css/dependent-dropdown.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="dropdownlist/js/dependent-dropdown.min.js" type="text/javascript"></script>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните следующие поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'secondName') ?>

                <?= $form->field($model, 'firstName') ?>

                <?= $form->field($model, 'midleName') ?>

                <?= $form->field($model, 'idCity')->dropDownList(
                    ArrayHelper::map(Cities::find()->all(), 'id', 'name'), 
                    //Cities::dropdown(),
                    [
                        'prompt'=>'Выберите город',
                        'onchange'=>'
                            $.post("index.php?r=universities/lists&id='.'"+$(this).val(), function(data)
                                {$("select#signupform-iduniversity").html(data);}
                            );',

                    ]); ?>

                <?= $form->field($model, 'idUniversity')->dropDownList(
                    //Universities::dropdown(), 
                    ArrayHelper::map(Universities::find()->all(), 'id', 'name'),
                    [
                        'prompt'=>'Выберите учебное заведение',
                        'onchange'=>'
                          $.post("index.php?r=facultet/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idfacultet").html(data);
                                $("select#signupform-idfacultet").change();
                            });'
                    ]); ?>

                <?= $form->field($model, 'idFacultet')->dropDownList(
                   // Facultet::dropdown(),
                    ArrayHelper::map(Facultet::find()->all(), 'id', 'name'), 
                    [
                        'prompt'=>'Выберите факультет',
                        'onchange'=>'
                            $.post("index.php?r=napravlenie/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idnapravlenie").html(data);
                                $("select#signupform-idnapravlenie").change();

                            });'
                    ]); ?>


                <?= $form->field($model, 'idNapravlenie')->dropDownList(
                    //Napravlenie::dropdown(),
                    ArrayHelper::map(Napravlenie::find()->all(), 'id', 'name'), 
                    [
                        'prompt'=>'Выберите направление',
                        'onchange'=>'
                            $.post("index.php?r=group/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idgroup").html(data);
                                $("select#signupform-idgroup").change();

                            });'
                    ]); ?>
                
                <?= $form->field($model, 'idGroup')->dropDownList(
                    Group::dropdown(),
                    [
                        'prompt'=>'Выберите группу'

                    ]); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\models\Cities;
use frontend\models\Universities;
use frontend\models\Facultet;
use frontend\models\Napravlenie;
use frontend\models\Group;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="dropdownlist/css/dependent-dropdown.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="dropdownlist/js/dependent-dropdown.min.js" type="text/javascript"></script>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните следующие поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'secondName') ?>

                <?= $form->field($model, 'firstName') ?>

                <?= $form->field($model, 'midleName') ?>

                <?= $form->field($model, 'idCity')->dropDownList(
                    ArrayHelper::map(Cities::find()->all(), 'id', 'name'), 
                    //Cities::dropdown(),
                    [
                        'prompt'=>'Выберите город',
                        'onchange'=>'
                            $.post("index.php?r=universities/lists&id='.'"+$(this).val(), function(data)
                                {$("select#signupform-iduniversity").html(data);}
                            );',

                    ]); ?>

                <?= $form->field($model, 'idUniversity')->dropDownList(
                    //Universities::dropdown(), 
                    ArrayHelper::map(Universities::find()->all(), 'id', 'name'),
                    [
                        'prompt'=>'Выберите учебное заведение',
                        'onchange'=>'
                          $.post("index.php?r=facultet/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idfacultet").html(data);
                                $("select#signupform-idfacultet").change();
                            });'
                    ]); ?>

                <?= $form->field($model, 'idFacultet')->dropDownList(
                   // Facultet::dropdown(),
                    ArrayHelper::map(Facultet::find()->all(), 'id', 'name'), 
                    [
                        'prompt'=>'Выберите факультет',
                        'onchange'=>'
                            $.post("index.php?r=napravlenie/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idnapravlenie").html(data);
                                $("select#signupform-idnapravlenie").change();

                            });'
                    ]); ?>


                <?= $form->field($model, 'idNapravlenie')->dropDownList(
                    //Napravlenie::dropdown(),
                    ArrayHelper::map(Napravlenie::find()->all(), 'id', 'name'), 
                    [
                        'prompt'=>'Выберите направление',
                        'onchange'=>'
                            $.post("index.php?r=group/lists&id='.'"+$(this).val(), function(data){
                                $("select#signupform-idgroup").html(data);
                                $("select#signupform-idgroup").change();

                            });'
                    ]); ?>
                
                <?= $form->field($model, 'idGroup')->dropDownList(
                    Group::dropdown(),
                    [
                        'prompt'=>'Выберите группу'

                    ]); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
