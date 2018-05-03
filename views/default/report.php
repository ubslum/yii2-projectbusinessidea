<?php
use ubslum\projectbusinessidea\models\ChoiceQuestion;
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaChoiceQuestion;
?>
<?php
$analytics = array(
    0 => array(//0-20
        'summary' => 'Kém khả thi',
        'content' => 'Ý tưởng kinh doanh hiện tại của bạn kém khả thi. Sẽ rất là rủi ro nếu bạn tiếp tục hiện thực hóa Ý tưởng kinh doanh này. Bạn hãy tìm một ý tưởng kinh doanh khác khả thi hơn hoặc phải điều chỉnh rất nhiều Ý tưởng kinh doanh ban đầu'
    ),
    1 => array(//21-40
        'summary' => 'Ít khả thi',
        'content' => 'Ý tưởng kinh doanh hiện tại của bạn ít khả thi. Sẽ khá là rủi ro nếu bạn tiếp tục hiện thực hóa Ý tưởng kinh doanh này, trừ khi bạn có một số điều chỉnh tương đối để cải thiện Ý tưởng kinh doanh ban đầu'
    ),
    2 => array(//41-60
        'summary' => 'Mức khả thi trung bình',
        'content' => 'Ý tưởng kinh doanh hiện tại của bạn nhìn chung là có tính khả thi. Tuy vậy, bạn cũng cần phải thận trọng. Bạn có thể suy nghĩ thêm một số giải pháp khác để tăng cường tính khả thi và giảm thiểu rủi ro cho Ý tưởng kinh doanh này'
    ),
    3 => array(//61-80
        'summary' => 'Rất khả thi',
        'content' => 'Ý tưởng kinh doanh hiện tại của bạn nhìn chung là rất khả thi. Ý tưởng kinh doanh này có nhiều tiềm năng. Hãy nghiên cứu những chổ bạn còn chưa hoàn thiện để tăng cường tính bền vững cho công việc kinh doanh của bạn'
    ),
    4 => array(//81-100
        'summary' => 'Cực kỳ khả thi',
        'content' => 'Tuyệt vời! Ý tưởng kinh doanh hiện tại của bạn nhìn chung là cực kỳ khả thi.Xin chúc mừng bạn! Còn chần chờ gì nữa, hãy bắt tay vào làm ngay và đẩy dự án lao về phía trước. Bạn có một nền tảng rất tốt để thành công cùng với Ý tưởng này'
    )
);
$report = array();
if ($model->points > 0 && $model->points <= 20){
    $report = $analytics[0];
}elseif($model->points > 20 && $model->points <= 40){
    $report = $analytics[1];
}elseif($model->points > 40 && $model->points <= 60){
    $report = $analytics[2];
}elseif($model->points > 60 && $model->points <= 80){
    $report = $analytics[3];
}elseif($model->points > 80 && $model->points <= 100){
    $report = $analytics[4];
}
?>

<div class="pdf-page" style="width: 100%; height: 2500px; padding: 10px; background: url('/images/bg.png')">
    <div class="logo-pdf"><img src="/images/logo-pdf.png" width="236" height="76"></div>
    <h1 class="kv-heading-1">BÁO CÁO ĐÁNH GIÁ TÍNH KHẢ THI CỦA Ý TƯỞNG KINH DOANH</h1>
    <div class="project-content">
        <p>Dự án: <?= $model->name ?></p>
        <p>Ngày: <?= date('d/m/Y H:i:s', strtotime($model->date_created)) ?></p>
        <p>Tên: <?= $model->owner_name ?></p>
        <p>Email: <?= $model->owner_email ?></p>
        <p>Số điện thoại: <?= $model->owner_phone ?></p>
    </div>
    <p class="footer">www.remove.vn</p>
</div>
<div class="pdf-page" style="width: 100%; height: 2500px; padding: 10px;">
    <div class="title-block">
        <table border="1" cellspacing=0 style="margin-bottom: 50px;display: block;">
            <tr>
                <td width="10%" style="background-color:#000;text-align:center;padding:20px 30px;color:#FFF;font-size:25px;">1</td>
                <td width="90%" style="padding: 20px 30px;text-align:center;"><h2>Phương pháp luận (Methodology)</h2></td>
            </tr>
        </table>
    </div>

    <p style="font-weight: bold; margin-bottom: 30px;">Xin chào: <?= $model->owner_name ?>!</p>
    <p>
        Ý tưởng kinh doanh là bước khởi đầu cho một công cuộc kinh doanh về sau. Từng là những người khởi nghiệp thực tế, chúng tôi hiểu bạn đang  ấp ủ và háo hức thế nào về ''đứa con tinh thần" của mình. Với kinh nghiệm của Đội ngũ Tư vấn Doanh nghiệp hàng đầu, chúng tôi xin phép được giúp bạn đánh giá tính khả thi của Ý tưởng Kinh doanh này.
    </p>
    <p>
        Nội dung và thang điểm đánh giá ý tưởng Kinh doanh được chúng tôi tham khảo và chắt lọc từ những nhà tư vấn khởi nghiệp và tư vấn kinh doanh hàng đầu thế giới như Tiến sĩ Tom McKaskill, Tim Berry, Niall StricKland cũng như những nhà tư vấn am hiểu tình hình kinh doanh của Việt Nam. Ngoài ra, nội dung còn được điều chỉnh một chút dưới góc nhìn của những doanh nhân đã từng khởi nghiệp, cũng như các Quỹ đầu tư vào Start-up.
    </p>
    <p>Chúng tôi hy vọng Báo cáo Đánh giá này cung cấp cho <?= $model->owner_name ?> thêm một góc nhìn khách quan về ý tưởng Kinh doanh của bạn.</p>
    <p>Chúng tôi xin chúc <?= $model->owner_name ?> sức khỏe và sự thành công trong kinh doanh!</p>
    <p style="font-weight: bold;">The REMOVE Team</p>
</div>
<?php
$groups = ChoiceQuestionGroup::find()->orderBy(['id'=>SORT_ASC])->all();
$pointa = 0;
$pointb = 0;
$pointc = 0;
$reporta = array();
$reportb = array();
$reportc = array();
if($groups){
    foreach($groups as $group){
        $points = 0;
        $ratio = 0;
        $sql = 'SELECT * FROM project_business_idea_choice_question WHERE id_project = :pid AND id_question in (SELECT id FROM choice_question WHERE id_group = :gid)';
        $q = ProjectBusinessIdeaChoiceQuestion::findBySql($sql, [':pid' => $model->id, ':gid' => $group->id])->all();
        if($q){
            foreach ($q as $rs){
                $points += $rs->points;
                $ratio = round($points/(50*count($q))*100);
            }
        }
        if($group->id == 1)
            $pointa = $ratio;
        elseif ($group->id == 2)
            $pointb = $ratio;
        elseif ($group->id == 3)
            $pointc = $ratio;
    }
}
if ($pointa >= 0 && $pointa <= 20){
    $reporta = $analytics[0];
}elseif($pointa > 20 && $pointa <= 40){
    $reporta = $analytics[1];
}elseif($pointa > 40 && $pointa <= 60){
    $reporta = $analytics[2];
}elseif($pointa > 60 && $pointa <= 80){
    $reporta = $analytics[3];
}elseif($pointa > 80 && $pointa <= 100){
    $reporta = $analytics[4];
}
if ($pointb >= 0 && $pointb <= 20){
    $reportb = $analytics[0];
}elseif($pointb > 20 && $pointb <= 40){
    $reportb = $analytics[1];
}elseif($pointb > 40 && $pointb <= 60){
    $reportb = $analytics[2];
}elseif($pointb > 60 && $pointb <= 80){
    $reportb = $analytics[3];
}elseif($pointb > 80 && $pointb <= 100){
    $reportb = $analytics[4];
}
if ($pointc >= 0 && $pointc <= 20){
    $reportc = $analytics[0];
}elseif($pointc > 20 && $pointc <= 40){
    $reportc = $analytics[1];
}elseif($pointc > 40 && $pointc <= 60){
    $reportc = $analytics[2];
}elseif($pointc > 60 && $pointc <= 80){
    $reportc = $analytics[3];
}elseif($pointc > 80 && $pointc <= 100){
    $reportc = $analytics[4];
}

?>

<div class="pdf-page" style="width: 100%; height: 2500px; padding: 10px;">
    <div class="title-block">
        <table border="1" cellspacing=0 style="margin-bottom: 50px;display: block;">
            <tr>
                <td width="10%" style="background-color:#000;text-align:center;padding:20px 30px;color:#FFF;font-size:25px;">2</td>
                <td width="90%" style="padding: 20px 30px;text-align:center;"><h2>Đánh giá Ý tưởng Kinh doanh</h2></td>
            </tr>
        </table>
    </div>
    <table border="1" cellspacing=0 style="margin-bottom: 50px;display: block;">
        <tr>
            <td colspan="2" style="padding: 20px 30px;text-align:center; background-color: #767171;"><h3>TÍNH KHẢ THI CHUNG CỦA Ý TƯỞNG KINH DOANH</h3></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; padding: 100px;"><img src="/images/pdf/<?= $model->id ?>-1.png" /></td>
            <td width="50%" style="padding: 10px;">
                <p style="font-weight: bold;">THANG ĐIỂM:</p>
                <ul>
                    <li><span>0-20 điểm: Kém khả thi</span></li>
                    <li><span>21-40 điểm: Ít khả thi</span></li>
                    <li><span>41-60 điểm: Mức khả thi trung bình</span></li>
                    <li><span>61-80 điểm: Rất khả thi</span></li>
                    <li><span>81-100 điểm: Cực kỳ khả thi</span></li>
                </ul>
                <br />
                <p style="font-weight: bold;">ĐÁNH GIÁ CHUNG:</p>
                <ul>
                    <li><span>Số điểm đánh giá chung cho Ý tưởng kinh doanh của <?= $model->owner_name ?> là <?= $model->points ?> điểm.</span></li>
                    <li><span><?= $report['content'] ?></span></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 20px 30px;text-align:center; background-color: #767171;"><h3>TÍNH KHẢ THI SẢN PHẨM / DỊCH VỤ</h3></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; padding: 100px;"><img src="/images/pdf/<?= $model->id ?>-2.png" /></td>
            <td width="50%" style="padding: 20px;">
                <p><?= $reporta['summary'] ?></p>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 20px 30px;text-align:center; background-color: #767171;"><h3>TÍNH KHẢ THI VỀ MẶT THỊ TRƯỜNG</h3></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; padding: 100px;"><img src="/images/pdf/<?= $model->id ?>-3.png" /></td>
            <td width="50%" style="padding: 20px;">
                <p><?= $reportb['summary'] ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 20px 30px;text-align:center; background-color: #767171;"><h3>TÍNH KHẢ THI TÀI CHÍNH</h3></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; padding: 100px;"><img src="/images/pdf/<?= $model->id ?>-4.png" /></td>
            <td width="50%" style="padding: 20px;">
                <p><?= $reportc['summary'] ?></p>
            </td>
        </tr>
    </table>
    <p>
        Đối với những chổ chưa đạt điểm số cao trong Phần đánh giá này, các chuyên gia của chúng tôi có thể tư vấn MIỄN PHÍ giúp bạn để Ý tưởng kinh doanh của bạn hoàn thiện và bền vững hơn. Hãy liên lạc với chúng tôi ngay hôm nay!
    </p>
</div>
<div class="pdf-page" style="width: 100%; height: 2500px; padding: 10px; display: block;"></div>
<div class="pdf-page" style="width: 100%; height: 2500px; padding: 10px;">
    <div class="title-block">
        <table border="1" cellspacing=0 style="margin-bottom: 50px;display: block;">
            <tr>
                <td width="10%" style="background-color:#000;text-align:center;padding:20px 30px;color:#FFF;font-size:25px;">3</td>
                <td width="90%" style="padding: 20px 30px;text-align:center;"><h2>Biểu đồ Đánh giá</h2></td>
            </tr>
        </table>
    </div>
    <?php
    $groups = ChoiceQuestionGroup::find()->orderBy(['id'=>SORT_ASC])->all();
    foreach($groups as $group): ?>
    <div id="details">
        <table border="1" style="border-collapse: collapse; width: 100%;">
            <tr>
                <th width="70%" style="background-color: #767171; color: #FFF; padding: 10px;"><?= $group->name; ?></th>
                <th width="6%" style="background-color: #767171; color: #FFF; text-align: center; padding: 10px;">1</th>
                <th width="6%" style="background-color: #767171; color: #FFF; text-align: center; padding: 10px;">2</th>
                <th width="6%" style="background-color: #767171; color: #FFF; text-align: center; padding: 10px;">3</th>
                <th width="6%" style="background-color: #767171; color: #FFF; text-align: center; padding: 10px;">4</th>
                <th width="6%" style="background-color: #767171; color: #FFF; text-align: center; padding: 10px;">5</th>
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
                    <th style="padding: 10px;"><?= $question->content; ?></th>
                    <th style="<?php echo ($flag==1)?"background-color: red;":"" ?>font-size:12px; font-weight: lighter; padding: 10px;"></th>
                    <th style="<?php echo ($flag==2)?"background-color: orange;":"" ?>font-size:12px; font-weight: lighter; padding: 10px;"></th>
                    <th style="<?php echo ($flag==3)?"background-color: yellow;":"" ?>font-size:12px; font-weight: lighter; padding: 10px;"></th>
                    <th style="<?php echo ($flag==4)?"background-color: lightgreen;":"" ?>font-size:12px; font-weight: lighter; padding: 10px;"></th>
                    <th style="<?php echo ($flag==5)?"background-color: green;":"" ?>font-size:12px; font-weight: lighter; padding: 10px;"></th>
                </tr>

            <?php endforeach; ?>
        </table><br />
        <?php endforeach; ?>
    </div>
    <img src="/images/hinha.jpg" style="margin-bottom:30px;">
    <p style="font-weight: bold; margin-bottom: 30px;">Kết quả của <?= $model->owner_name ?> thế nào?</p>
    <p>
        Nếu kết quả của <?= $model->owner_name ?> tích cực, xin chúc mừng bạn!
        Nếu trường hợp kết quả của <?= $model->owner_name ?> chưa được khả quan, chúng tôi nghĩ <?= $model->owner_name ?> cũng không hề nhụt chí. Khởi nghiệp là dám dấn thân.
    </p>
    <p>
        Nếu <?= $model->owner_name ?> không làm những gì <?= $model->owner_name ?> chưa từng làm, thì <?= $model->owner_name ?> sẽ không có những gì <?= $model->owner_name ?> chưa từng có. Hơn nữa, tương lai của kinh tế Việt Nam phụ thuộc vào luồng gió khởi nghiệp đến từ những người như <?= $model->owner_name ?>.
    </p>
    <p>
        Ai đi xa cũng cần phải có bản đồ, nếu không thì rất dễ mày mò, lạc lối và tốn kém. Việc kinh doanh cũng vậy, cũng cần phải hoạch định bài bản. Bạn càng bận rộn bao nhiêu thì bạn càng cần Kế hoạch kinh doanh bấy nhiêu. Bạn có thể đánh mất cả một khu rừng nếu chỉ quá tập trung vào một vài cái cây đơn lẻ. Bước tiếp theo của một Ý tưởng Kinh doanh là một Bản Kế hoạch Kinh doanh hoàn chỉnh và chi tiết.
    </p>
    <img src="/images/hinha.jpg" style="margin-bottom:30px;">
    <p>
        Đội ngũ Tư vấn của chúng tôi gồm những doanh nhân đã từng khởi nghiệp, và những chuyên gia tư vấn kinh doanh hàng đầu, rất hân hạnh được hỗ trợ bạn xây dựng một Bản Kế hoạch Kinh doanh như vậy (60-120 trang), với các đặc điểm và lợi ích sau:
    </p>
    <ul>
        <li><span>Kế hoạch Kinh doanh chuyên nghiệp, chuẩn mực quốc tế, có điều chỉnh cho phù hợp với môi trường ở Việt Nam.</span></li>
        <li><span>Giúp bạn có được Kế hoạch kinh doanh sống động, để bạn cập nhật những thay đổi khi môi trường thay đổi</span></li>
        <li><span>Giúp bạn có hồ sơ kêu gọi vốn đầu tư</span></li>
        <li><span>Giúp bạn quản lý công việc kinh doanh của bạn</span></li>
        <li><span>Giúp bạn tiết kiệm thời gian và chi phí hơn nhiều so với việc bạn phải tự làm kế hoạch</span></li>
        <li><span>Giúp bạn có một khởi đầu thuận lợi và nhanh chóng triển khai Ý tưởng kinh doanh của mình</span></li>
        <li><span><?= $model->owner_name ?> hãy liên lạc với chúng tôi trong hôm nay!</span></li>
    </ul>
</div>