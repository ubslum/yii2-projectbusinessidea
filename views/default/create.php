<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */

$this->title = 'Create Project Business Idea';
$this->params['breadcrumbs'][] = ['label' => 'Project Business Ideas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-business-idea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
