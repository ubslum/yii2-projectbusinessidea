<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-business-idea-form">
    <p>Xin chúc mừng! Bạn đã hoàn thành bài trắc nhiệm đánh giá ý tưởng của mình!</p>

    <p>Xin vui lòng cung cấp thông tin để Remove.vn có thể gửi kết quả cho bạn.</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_phone')->textInput(['maxlength' => true]) ?>

    <?= Html::hiddenInput('answers', '', array('id' => 'answers-store')) ?>

    <div class="form-group">
        <?= Html::submitButton('Hoàn tất', ['class' => 'btn btn-default', 'id' => 'finish-bcc']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
