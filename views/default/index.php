<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Business Ideas';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="page-section" id="about">
    <div class="container relative">
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">CHÚNG TÔI LÀ AI VÀ LÀM GÌ ?</h2>
        <div class="section-text">
            <div class="project-business-idea-index">

        <?=
        Tabs::widget([
            'items' => [
                [
                    'label' => 'Tab bbb one',
                    'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
                ],
                [
                    'label' => 'Tab two',
                    'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
                    'options' => ['tag' => 'div'],
                    'headerOptions' => ['class' => 'my-class'],
                ],
                [
                    'label' => 'Tab with custom id',
                    'content' => 'Morbi tincidunt, dui sit amet facilisis feugiat...',
                    'options' => ['id' => 'my-tab'],
                ],

            ],
            'options' => ['tag' => 'div'],
            'itemOptions' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-cppkkkklass'],
            'clientOptions' => ['collapsible' => false],
        ]);
        ?>
</section>
