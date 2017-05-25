<?php

use ubslum\projectbusinessidea\models\ChoiceQuestion;
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaChoiceQuestion;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBusinessIdea */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Đánh giá ý tưởng kinh doanh', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$js = file_get_contents(__DIR__ . '/view.js');
$this->registerJs($js);
$this->registerCss("table, th, td {border: 1px solid black; border-collapse: collapse;} th, td {padding: 5px;} #details table {width: 100%;} #details table th a {color: #000; text-decoration: none; width: 100%; display: block;} #details table th a:hover {color: #000; text-decoration: none;} #details table tr:hover {background-color: #C1C1C1}");
?>
<section class="page-section" id="about">
    <div class="container relative">
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">Ý tưởng kinh doand: <?= Html::encode($this->title) ?></h2>
        <div class="section-text">
            <div class="project-business-idea-view">
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
//                        'status',
                    ],
                ]) ?>
            </div>
        </div>
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">Câu hỏi - trả lời</h2>
            <?php
            $groups = ChoiceQuestionGroup::find()->orderBy(['id'=>SORT_ASC])->all();
            foreach($groups as $group): ?>
        <div id="details">
        <table>
                <tr>
                    <th width="70%" style="background-color: #000; color: #FFF;"><?= $group->name; ?></th>
                    <th width="6%" style="background-color: #000; color: #FFF; text-align: center">1</th>
                    <th width="6%" style="background-color: #000; color: #FFF; text-align: center">2</th>
                    <th width="6%" style="background-color: #000; color: #FFF; text-align: center">3</th>
                    <th width="6%" style="background-color: #000; color: #FFF; text-align: center">4</th>
                    <th width="6%" style="background-color: #000; color: #FFF; text-align: center">5</th>
                </tr>
                <?php
                $questions = ChoiceQuestion::find()->where(['id_group' => $group->id])->all();
                foreach ($questions as $question):
                    $project_question_answer = ProjectBusinessIdeaChoiceQuestion::findOne(['id_project' => $model->id, 'id_question' => $question->id]);
                    $answers = ChoiceQuestionAnswer::find()->where(['id_question' => $question->id])->orderBy(['points'=>SORT_ASC])->all();
                    $flag = 0;
                    foreach ($answers as $index=>$answer){
                        if($answer->id == $project_question_answer->id_answer){
                            $flag = $index + 1;
                            break;
                        }
                    }

                    ?>
                    <tr>
                        <th><a href="#q" class="viewmore" qid="<?= $question->id ?>"><?= $question->content; ?> - <?= $project_question_answer->points ?> điểm</a></th>
                        <th style="<?php echo ($flag==1)?"background-color: red":"" ?>"></th>
                        <th style="<?php echo ($flag==2)?"background-color: yellow":"" ?>"></th>
                        <th style="<?php echo ($flag==3)?"background-color: lightgreen":"" ?>"></th>
                        <th style="<?php echo ($flag==4)?"background-color: green":"" ?>"></th>
                        <th style="<?php echo ($flag==5)?"background-color: blue":"" ?>"></th>
                    </tr>

                <?php endforeach; ?>
        </table><br />
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php echo Html::hiddenInput('pid', $model->id, array('id' => 'pid')) ?>
<?php Modal::begin([
    'id' => 'question-content',
    'header' => '<h2>Nội dung chi tiết</h2>',
//    'toggleButton' => ['label' => 'click me'],
]);

echo "<div id='modalContent'></div>";

Modal::end(); ?>