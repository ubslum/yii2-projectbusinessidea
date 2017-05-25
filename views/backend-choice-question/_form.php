<?php

use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="choice-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_group')->dropDownList(ArrayHelper::map(ChoiceQuestionGroup::find()->all(), 'id', 'name'), ['prompt'=>'== Chọn nhóm câu hỏi ==']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
