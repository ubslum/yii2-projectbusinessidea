<p><b><?= $question->content . ' - ' . $p_q_a->points . ' điểm' ?></b></p>
<?php foreach ($answers as $answer): ?>
    <ul>
        <li><p style="<?php echo ($p_q_a->id_answer == $answer->id)?"font-weight: bold":"" ?>"><?= $answer->content ?></p></li>
    </ul>

<?php endforeach; ?>