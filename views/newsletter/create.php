<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\projectbusinessidea\models\Newsletter */

$this->title = 'Đăng ký nhận quà tặng';
$this->params['breadcrumbs'][] = ['label' => 'Đăng ký nhận quà tặng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$js = file_get_contents(__DIR__ . '/create.js');
$this->registerJs($js);
?>
<section class="page-section" id="newsletter-block">
    <div class="container relative">
        <!--        <h1 class="section-title font-alt align-left mb-70 mb-sm-40">--><?php //echo Html::encode($this->title) ?><!--</h1>-->
        <div class="section-text">
            <div class="project-business-idea-index">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</section>