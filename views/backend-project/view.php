<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ý tưởng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-business-idea-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date_created',
            'owner_name',
            'owner_email:email',
            'owner_phone',
            'points',
//            'status',
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => Html::a($model->name, ['default/view', 'id' => $model->id, 't' => strtotime($model->date_created)], ['target' => '_blank']),
                'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
                'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
        ],
    ]) ?>

</div>
