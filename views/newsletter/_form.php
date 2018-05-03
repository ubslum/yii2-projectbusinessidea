<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="width: 460px; overflow: hidden; background-image: url(/images/bg-title.png);background-repeat: no-repeat; background-color: #ebebeb; font-family: Helvetica, 'Helvetica Neue', Arial, sans-serif;margin: 0 auto;">
    <div style="width: 100%; height: 206px; overflow: hidden;">
        <div style="width: 298px;margin-left: 92px;margin-top: 26px;">
            <h1 style="font-family: Helvetica, 'Helvetica Neue', Arial, sans-serif;font-size: 29px;color: rgb(255, 255, 255);line-height: 1.1;text-align: left;">Đăng ký nhận quà</h1>
        </div>
        <div class="text-content" style="color: rgb(0, 175, 236); text-align: center;">
            <span style="font-family: Helvetica, 'Helvetica Neue', Arial, sans-serif;color: rgb(255, 255, 255);">
                Bộ tài liệu hướng dẫn Lập kế hoạch kinh doanh
            </span>
        </div>
        <div data-editable="static-text" id="s_3jjt7" style="width: 220px; height: 40px; margin-left: 119px; margin-top: 12px;">
            <div class="text-content" style="color: rgb(0, 175, 236); text-align: center;">
                <span style="font-family: Helvetica, 'Helvetica Neue', Arial, sans-serif;color: rgb(255, 255, 255);text-decoration: line-through;">500.000đ</span>
            </div>
        </div>
        <div data-editable="static-text" id="s_3jj35" style="width: 319px; height: 40px; margin-left: 71px;">
            <div class="text-content" style="font-family: Helvetica, 'Helvetica Neue', Arial, sans-serif;color: rgb(238, 147, 27); font-size: 24px; text-align: center;">
                HOÀN TOÀN MIỄN PHÍ
            </div>
        </div>
    </div>
    <div class="newsletter-form" style="margin-top: 8px; padding: 20px;">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => '+84']) ?>

        <div class="form-group" style="text-align: center;">
            <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>


