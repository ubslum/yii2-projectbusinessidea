<?php
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<p class="section-title font-alt align-left mb-70 mb-sm-40"><?= $group->name ?></p>
<div class="section-text">
    <p class="section-question" style="font-weight: bold;">Câu số <?= $cur ?>/<?= $total ?>: <?= $question->content ?></p>
        <?php
            $answers = ChoiceQuestionAnswer::find()->where(['id_question' => $question->id])->all();
            foreach($answers as $a):
        ?>
        <label class="question-answer-block checkbox" style="font-weight: normal; padding: 10px;">
            <input type="radio" name="answer[<?= $question->id ?>]" value="<?= $a->id ?>" optquestion="<?= $question->id ?>">
            <span class="checkbox__icon"></span>
            <?= $a->content ?>
        </label>
    <?php endforeach; ?>
<!--    <div style="display: block; width: 100%; text-align: center;">Câu số: --><?//= $cur ?><!--/--><?//= $total ?><!--</div>-->
</div>