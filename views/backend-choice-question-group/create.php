<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionGroup */

$this->title = 'Tạo nhóm câu hỏi';
$this->params['breadcrumbs'][] = ['label' => 'Nhóm câu hỏi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
