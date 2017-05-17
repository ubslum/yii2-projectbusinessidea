<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-business-idea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
