<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(".newsletter-form label { display: none; } .btn{ padding: 14px 45px; } .form-control{ height: 48px; padding: 6px 25px; }");

?>
<div style="width: 100%; overflow: hidden; font-family: 'Times New Roman', Arial, sans-serif;">
    <div class="newsletter-form" style="padding: 8px;">

        <?php $form = ActiveForm::begin([
          'options' => ['id' => 'newsletter-form']
        ]); ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'placeholder' => 'Tên của bạn']) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Di động']) ?>

        <div class="form-group" style="">
            <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-default', 'style' => 'background-color: #000; color: #FFF; text-transform: uppercase;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>


