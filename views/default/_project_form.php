<?php
/**
 * Created by PhpStorm.
 * User: shini
 * Date: 5/17/2017
 * Time: 12:17 PM
 */
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'name',
        'date_created',
        'owner_name',
        'owner_email:email',
        // 'owner_phone',
        // 'points',
        // 'status',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);