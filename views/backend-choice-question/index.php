<?php

use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ubslum\projectbusinessidea\models\ChoiceQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Câu hỏi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo câu hỏi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_group',
//                'type' => 'html',
                'value' => function($model) {
                    return ChoiceQuestionGroup::findOne($model->id_group)->name;
                },
                'filter' => ArrayHelper::map(ChoiceQuestionGroup::find()->all(), 'id', 'name'),
            ],
            'content:ntext',
//            'user_update',
            'date_created',
//            [
//                'attribute' => 'date_created',
////                'type' => 'html',
//                'value' => function($model) {
//                    return $model->date_created;
//                },
//                'filter' => ArrayHelper::map(ChoiceQuestionGroup::find()->all(), 'id', 'name'),
//            ],
            // 'date_updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
