<?php

use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\ChoiceQuestion */

$this->title = $model->content;
$this->params['breadcrumbs'][] = ['label' => 'Câu hỏi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn muốn xóa câu hỏi này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [                                                  // the owner name of the model
                'attribute' => 'id_group',
                'value' => ChoiceQuestionGroup::findOne($model->id_group)->name,
                'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            'content:ntext',
//            'user_update',
//            'date_created',
//            'date_updated',
//            'status',
        ],
    ]) ?>

</div>
