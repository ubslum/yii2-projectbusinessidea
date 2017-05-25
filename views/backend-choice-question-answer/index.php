<?php

use ubslum\projectbusinessidea\models\ChoiceQuestion;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ubslum\projectbusinessidea\models\ChoiceQuestionAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Câu trả lời';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo câu trả lời', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'id_question',
            [
                'attribute' => 'id_question',
//                'type' => 'html',
                'value' => function($model) {
                    return ChoiceQuestion::findOne($model->id_question)->content;
                },
                'filter' => ArrayHelper::map(ChoiceQuestion::find()->all(), 'id', 'content'),
            ],
            'content:ntext',
            'points',
//            'user_update',
            // 'date_created',
            // 'date_updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
