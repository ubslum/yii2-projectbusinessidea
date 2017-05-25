<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;


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
                <a class="btn btn-primary btnPrevious" >Previous</a>
                <a class="btn btn-primary btnNext" >Next</a>
            </div>
        </div>
    </div>

</section>
