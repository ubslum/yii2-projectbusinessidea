<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionGroup */

$this->title = 'Create Choice Question Group';
$this->params['breadcrumbs'][] = ['label' => 'Choice Question Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
