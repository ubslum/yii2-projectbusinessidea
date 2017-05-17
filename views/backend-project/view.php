<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project Business Ideas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-business-idea-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'status',
        ],
    ]) ?>

</div>
