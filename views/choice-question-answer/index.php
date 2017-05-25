<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ubslum\projectbusinessidea\models\ChoiceQuestionAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Choice Question Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Choice Question Answer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_question',
            'content:ntext',
            'points',
            'user_update',
            // 'date_created',
            // 'date_updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
