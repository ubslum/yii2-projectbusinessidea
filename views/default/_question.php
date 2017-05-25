<?php
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<p class="section-title font-alt align-left mb-70 mb-sm-40"><?= $group->name ?></p>
<div class="section-text">
    <p class="section-question"><?= $question->content ?></p>
        <?php
            $answers = ChoiceQuestionAnswer::find()->where(['id_question' => $question->id])->all();
            foreach($answers as $a):
        ?>
        <label class="question-answer-block">
            <input type="radio" name="answer[<?= $question->id ?>]" value="<?= $a->id ?>" optquestion="<?= $question->id ?>">
            <?= $a->content ?>
        </label>
    <?php endforeach; ?>
</div>