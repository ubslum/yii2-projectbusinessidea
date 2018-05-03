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
//$this->registerCss("body { background-color: #ebebeb; font-family: 'Times New Roman', Arial, sans-serif; } .alert-info { background-color: transparent; font-weight: bold; } .container-title h1{ color: #FFF; } #newsletter-block .container{ width: 100%; }");
$css = file_get_contents(__DIR__ . '/create.css');
$this->registerCss($css);
?>
<section class="page-section" id="newsletter-block" style="padding: 0; width: 720px; height: 455px; overflow: hidden">
    <div class="container relative" style="padding: 0;">
        <div class="container-title" style="width: 720px; height: 150px; overflow: hidden; background-image: url('/images/bg-newsletter.png');background-repeat: no-repeat; background-color: #ebebeb; color: #FFFFFF !important; text-align: center; padding: 20px;">
            <h1>Đăng ký nhận quà tặng</h1>
            <p>Bộ tài liệu hướng dẫn Lập kế hoạch kinh doanh</p>
            <p style="text-decoration: line-through; font-weight: bold;">500.000đ</p>
            <p class="free-text">HOÀN TOÀN MIỄN PHÍ</p>
        </div>
        <div class="container-content" style="overflow: hidden; width: 100%; height: 100%; display: block;">
            <div style="width: 320px; float: left">
                <img src="images/newsletter-books.png">
            </div>
            <div style="width: 400px; float: right; padding-top: 25px; padding-right: 40px;">
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
