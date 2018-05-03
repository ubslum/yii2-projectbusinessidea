<?php
/**
 * Created by PhpStorm.
 * User: shini
 * Date: 1/11/2018
 * Time: 12:28 PM
 */
use kartik\export\ExportMenu;
use kartik\grid\GridView;
//echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => $gridColumns
//]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'toolbar'=>[
        '{export}',
    ],
    'export' => [
        'fontAwesome' => true
    ],
]);