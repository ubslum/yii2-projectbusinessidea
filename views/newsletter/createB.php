<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\Newsletter */

$this->title = 'Đăng ký nhận quà tặng';
$this->params['breadcrumbs'][] = ['label' => 'Đăng ký nhận quà tặng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$js = file_get_contents(__DIR__ . '/create.js');
$css = file_get_contents(__DIR__ . '/create.css');
$this->registerJs($js);
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
                <div class="section-text">
                    <div class="project-business-idea-index">
                        <?= $this->render('_formb', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>