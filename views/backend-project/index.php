<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ý tưởng';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="page-section" id="about">
    <div class="container relative">
<!--        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">CHÚNG TÔI LÀ AI VÀ LÀM GÌ ?</h2>-->
        <div class="section-text">
            <div class="project-business-idea-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Tạo ý tưởng', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'id' => 'kv-grid-demo',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        'date_created',
                        'owner_name',
                        'owner_email:email',
                         'owner_phone',
                         'points',
                        [
                            'attribute' => 'link',
                            'format' => 'raw',
                            'value' => function($model) {
                                return Html::a($model->name, ['default/view', 'id' => $model->id, 't' => strtotime($model->date_created)], ['target' => '_blank']);
                            },
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{view}{update}',
                        ],
                    ],
                    'pjax' => true,
                    'toolbar' =>  [
                        '{export}',
                        '{toggleData}',
                    ],
                    'export' => [
                        'fontAwesome' => true
                    ],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => 'Danh sách ý tưởng kinh doanh',
                    ],
//                    'exportConfig' => $exportConfig,
                ]); ?>
            </div>
        </div>
</section>
