<?php

use app\assets\AppAsset;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Business Ideas';
$this->params['breadcrumbs'][] = $this->title;
//$js = file_get_contents(__DIR__ . '/initSuccess.js');
//$this->registerJs($js);

?>
<script src="/js/jquery.js"></script>
<div style="position: absolute; top: 0; left: 0;">Đang xử lý...</div>
<?= Html::hiddenInput('pid', $pid, ['id' => 'pid']) ?>
<?= Html::hiddenInput('t', $t, ['id' => 't']) ?>
<div style="display: block; overflow: hidden; width: 0px; height: 0px">
    <iframe src="/projectbusinessidea/default/save-image?r=<?= $model->points ?>&f=<?= $pid ?>-1"></iframe>
    <iframe src="/projectbusinessidea/default/save-image?r=<?= $pointa ?>&f=<?= $pid ?>-2"></iframe>
    <iframe src="/projectbusinessidea/default/save-image?r=<?= $pointb ?>&f=<?= $pid ?>-3"></iframe>
    <iframe src="/projectbusinessidea/default/save-image?r=<?= $pointc ?>&f=<?= $pid ?>-4"></iframe>
</div>
<script>
    var pid = jQuery("#pid").val();
    var t = jQuery("#t").val();
    setTimeout(function(){
        window.location.replace("/projectbusinessidea/default/view-success?pid="+pid+"&t="+t);
    }, 3000);

    function UrlExists(url)
    {
        var response = jQuery.ajax({
            url: url,
            type: 'HEAD',
            async: false
        }).status;

        return (response != "200") ? false : true;
    }
    function myLoop () {           //  create a loop function
        if(UrlExists("/images/pdf/"+pid+"-1.png")){
            //redirect to view
            setTimeout(function(){
                window.location.replace("/bao-cao-danh-gia-y-tuong-kinh-doanh/ket-qua-bao-cao/"+pid+"-"+t);
            }, 3000);
        }else{
            setTimeout(function () {
                myLoop();
            }, 1000)
        }
    }
    myLoop();
</script>