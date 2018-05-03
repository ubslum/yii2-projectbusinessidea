<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionAnswer */

$this->title = 'Tạo câu trả lời';
$this->params['breadcrumbs'][] = ['label' => 'Câu trả lời', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
