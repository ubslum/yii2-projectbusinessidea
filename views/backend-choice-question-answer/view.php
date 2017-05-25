<?php

use ubslum\projectbusinessidea\models\ChoiceQuestion;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestionAnswer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Câu trả lời', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-answer-view">

    <h1><?= 'Câu trả lời: '.Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa câu trả lời này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [                                                  // the owner name of the model
                'attribute' => 'id_question',
                'value' => ChoiceQuestion::findOne($model->id_question)->content,
                'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            'content:ntext',
            'points',
//            'user_update',
//            'date_created',
//            'date_updated',
//            'status',
        ],
    ]) ?>

</div>
