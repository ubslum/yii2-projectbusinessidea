<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel ubslum\projectbusinessidea\models\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bản tin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Newsletter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'fullname',
            'email:email',
            'phone',
//            'date_created',
            // 'date_updated',
            // 'user_update',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
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
    ]); ?>
</div>
