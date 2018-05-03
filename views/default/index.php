<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Business Ideas';
$this->params['breadcrumbs'][] = $this->title;
$js = file_get_contents(__DIR__ . '/index.js');
$this->registerJs($js);
$this->registerCss("label { width: 100%; }");
?>
<section class="page-section" id="about">
    <div class="container relative">
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">Câu hỏi trắc nghiệm</h2>
        <div class="section-text">
            <div class="project-business-idea-index">

        <?=
        Tabs::widget([
            'items' => $items,
            'options' => ['tag' => 'div'],
            'itemOptions' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-cppkkkklass'],
            'clientOptions' => ['collapsible' => false],
        ]);
        ?>
                <div style="display: block; width: 100%; text-align: center;">
                    <a class="btn btn-default btnPrevious" style="margin: 20px; display: none; text-decoration: none;" >Trở lại</a>
                    <a class="btn btn-default btnNext" style="margin: 20px; text-decoration: none;" >Bắt đầu</a>
                </div>
            </div>
        </div>
    </div>
</section>
