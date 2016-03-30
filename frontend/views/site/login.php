<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните следующие поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?php if($model->scenario === 'loginWithEmail'){?>
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <?php } else{ ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?php } ?>
                <?= $form->field($model, 'password_hash')->passwordInput() ?>

                <div style="color:#999;margin:1em 0">
                    Если забыли пароль, можно <?= Html::a('восстановить', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
