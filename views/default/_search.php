<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdeaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-business-idea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'owner_name') ?>

    <?= $form->field($model, 'owner_email') ?>

    <?php // echo $form->field($model, 'owner_phone') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
