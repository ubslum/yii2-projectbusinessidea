<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionGroup */

$this->title = 'Cập nhật nhóm câu hỏi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nhóm câu hỏi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="choice-question-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
