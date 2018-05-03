<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\Alert;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đăng ký nhận quà';
$this->params['breadcrumbs'][] = $this->title;
//$js = file_get_contents(__DIR__ . '/viewSuccess.js');
//$this->registerJs($js);
?>
<section class="page-section" id="about">
    <div class="container relative">
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">Thông báo</h2>
        <div class="section-text">
            <div class="project-business-idea-index">
                <?php
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
//                    'body' => 'Say hello...',
                ]);
                ?>
            </div>
        </div>
    </div>

</section>