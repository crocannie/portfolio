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

                <?= $form->field($model, 'password_hash')->passwordInput() ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
