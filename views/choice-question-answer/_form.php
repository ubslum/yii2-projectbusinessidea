<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="choice-question-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_question')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'user_update')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
