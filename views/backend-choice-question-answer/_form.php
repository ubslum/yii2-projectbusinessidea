<?php

use ubslum\projectbusinessidea\models\ChoiceQuestion;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="choice-question-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_question')->dropDownList(ArrayHelper::map(ChoiceQuestion::find()->all(), 'id', 'content'), ['prompt'=>'== Chọn câu hỏi ==']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
