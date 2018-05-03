<?php

namespace ubslum\projectbusinessidea\controllers;

use app\modules\user\models\User;
use ubslum\projectbusinessidea\components\MyMailChimp;
use ubslum\projectbusinessidea\models\ChoiceQuestion;
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaChoiceQuestion;
use Yii;
use ubslum\projectbusinessidea\models\ProjectBusinessIdea;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use linslin\yii2\curl;
use yii\httpclient\Client;
use yii\data\ActiveDataProvider;
use kartik\export\ExportMenu;
use yii\db\Query;
use ubslum\projectbusinessidea\components\Common;

/**
 * DefaultController implements the CRUD actions for ProjectBusinessIdea model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectBusinessIdea models.
     * @return mixed
     */
    public function actionIndex()
    {
//        return $this->redirect(['view-success']);
        $searchModel = new ProjectBusinessIdeaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new ProjectBusinessIdea();

        $question = ChoiceQuestion::find()->all();
        $totalQuestions = count($question);
        $items = [];
        $items[] = ['label' => 'begin' , 'content' => $this->renderPartial('_beginIndex'),];
        foreach ($question as $index=>$q){
            $group = ChoiceQuestionGroup::findOne($q->id_group);
            $label = $index+1;
            $items[] = ['label' => $label , 'content' => $this->renderPartial('_question', array('group' => $group, 'question' => $q, 'cur' => $index+1, 'total' => $totalQuestions)),];
        }
        $items[] = ['label' => 'form' , 'content' => $this->renderPartial('_form', array('searchModel' => $searchModel, 'dataProvider' => $dataProvider,'model' => $model,)),];

        $request = Yii::$app->request;

        $tmp = $request->post('answers');
        $answers = json_decode($tmp);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $totalPoints = 0;
            foreach ($question as $index=>$q){
                $question_answer = new ProjectBusinessIdeaChoiceQuestion();
                $question_answer->id_project = $model->id;
                $question_answer->id_question = $q->id;
                $question_answer->id_answer = $answers[$q->id];
                $answerModel = ChoiceQuestionAnswer::findOne($answers[$q->id]);
                $question_answer->points = $answerModel->points;
                $question_answer->save();
                $totalPoints += $question_answer->points;
            }
            $model->points = round($totalPoints/(count($question)*50)*100);
            $model->save();
            //mailchimp
            $mailchimp = new MyMailChimp();
            $mailchimp->addMember($model->owner_name, $model->owner_email, $model->owner_phone);

            //send mail
            Yii::$app->mail->compose('report-email', ['project' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo($model->owner_email)
                ->setSubject('Báo cáo đánh giá ý tưởng kinh doanh - REMOVE Team')
                ->send();

            //send mail to admin
            Yii::$app->mail->compose('report-email-admin', ['project' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setSubject("Sử dụng BCC: " . $model->owner_name . " (".$model->owner_phone."-".$model->owner_email.")")
                ->send();

//            \Yii::$app->getSession()->setFlash('success', 'Báo cáo đã hoàn thành.');
            return $this->redirect(['init-success', 'pid' => $model->id, 't' => strtotime($model->date_created)]);
//            return $this->redirect(['view', 'id' => $model->id, 't' => strtotime($model->date_created)]);
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
                'items' => $items
            ]);
        }
    }

    /**
     * Displays a single ProjectBusinessIdea model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $t)
    {

        $model = $this->findModel($id);
        if(strtotime($model->date_created) != $t){
            throw new \yii\web\NotFoundHttpException("Không tìm thấy trang này.");
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new ProjectBusinessIdea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectBusinessIdea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectBusinessIdea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProjectBusinessIdea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectBusinessIdea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectBusinessIdea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectBusinessIdea::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * load content ajax
     */
    public function actionAjaxQuestionContent(){
//        echo 'aaaa';
        $request = Yii::$app->request;
        $pid = $request->post('pid');
        $qid = $request->post('qid');
        $question = ChoiceQuestion::findOne($qid);
        $answers = ChoiceQuestionAnswer::find()->where(['id_question' => $question->id])->orderBy(['points' => SORT_ASC])->all();
        $p_q_a = ProjectBusinessIdeaChoiceQuestion::findOne(['id_project' => $pid, 'id_question' => $qid]);
        echo $this->renderPartial('_ajaxQuestion', [
            'question' => $question,
            'answers' => $answers,
            'p_q_a' => $p_q_a
        ]);
    }

    public function actionTest(){
//        $client = new Client(['baseUrl' => 'http://dev.dotplant.com/projectbusinessidea/default/save-image']);
//        $response = $client->get('articles', ['r' => '50', 'f' => 'eee'])->send();


//        $client = new Client(['baseUrl' => 'http://dev.dotplant.com/projectbusinessidea/default/save-image?r=50&f=ddd']);
//        $response = $client->createRequest()
//            ->setUrl('http://dev.dotplant.com/projectbusinessidea/default/save-image?r=50&f=ddd')
//            ->setData([
//                'r' => '50',
//                'f' => 'ddd',
//            ])
//            ->send();
//        if ($response->isOk) {
//            echo 'OK';
//        }
//        var_dump($response);
//        $user = User::findOne([
//            'status' => User::STATUS_ACTIVE,
//            'email' => 'shinichi7586@gmail.com',
//        ]);
//        $project = ProjectBusinessIdea::findOne(9);
//        return Yii::$app->mail->compose('report-email', ['project' => $project])
//            ->setFrom(Yii::$app->getModule('core')->emailConfig['mailFrom'])
//            ->setTo('shinichi7586@gmail.com')
//            ->setSubject('testemail')
//            ->send();
//        $this->render('test');
        phpinfo();
    }

    /**
     * loading init to resolve pdf code
     */
    public function actionInitSuccess($pid, $t){
        $this->layout = "@app/themes/basic/layouts/print";
        $model = ProjectBusinessIdea::findOne($pid);
        if(isset($model) && $t != strtotime($model->date_created)){
            throw new \yii\web\NotFoundHttpException("Không tìm thấy trang này.");
        }
//        \Yii::$app->getSession()->setFlash('success', 'Báo cáo đã hoàn thành.');
        //calcualate ratio
        $groups = ChoiceQuestionGroup::find()->all();
        $pointa = 0;
        $pointb = 0;
        $pointc = 0;
        if($groups){
            foreach($groups as $group){
                $points = 0;
                $ratio = 0;
                $sql = 'SELECT * FROM project_business_idea_choice_question WHERE id_project = :pid AND id_question in (SELECT id FROM choice_question WHERE id_group = :gid)';
                $q = ProjectBusinessIdeaChoiceQuestion::findBySql($sql, [':pid' => $pid, ':gid' => $group->id])->all();
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


//        $this->report($model->id);
        return $this->render('initSuccess', ['pid' => $pid, 'model' => $model, 'pointa' => $pointa, 'pointb' => $pointb, 'pointc' => $pointc, 't' => $t]);
    }



    /**
     * alert success
     */
    public function actionViewSuccess($pid, $t){
        $model = ProjectBusinessIdea::findOne($pid);
        if(isset($model) && $t != strtotime($model->date_created)){
            throw new \yii\web\NotFoundHttpException("Không tìm thấy trang này.");
        }
        \Yii::$app->getSession()->setFlash('success', 'Kết quả đánh giá sẽ gửi vào email của bạn trong ít phút. Cảm ơn bạn đã dành thời gian với Remove.<br /><div class="pdf-msg"></div>');
        //calcualate ratio
        $groups = ChoiceQuestionGroup::find()->all();
        $pointa = 0;
        $pointb = 0;
        $pointc = 0;
        if($groups){
            foreach($groups as $group){
                $points = 0;
                $ratio = 0;
                $sql = 'SELECT * FROM project_business_idea_choice_question WHERE id_project = :pid AND id_question in (SELECT id FROM choice_question WHERE id_group = :gid)';
                $q = ProjectBusinessIdeaChoiceQuestion::findBySql($sql, [':pid' => $pid, ':gid' => $group->id])->all();
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


//        $this->report($model->id);
        return $this->render('viewSuccess', ['pid' => $pid, 'model' => $model, 'pointa' => $pointa, 'pointb' => $pointb, 'pointc' => $pointc]);
    }

    /**
     * save image with canvas
     */
    public function actionSaveImage(){
        $this->layout = "@app/themes/basic/layouts/print";
        if (array_key_exists('imageData',$_POST)) {
            $imageData=$_POST['imageData'];
            $filename = isset($_POST['filename'])?($_POST['filename'].'.png'):"test.png";
            $filteredData=substr($imageData, strpos($imageData, ",")+1);
            $unencodedData=base64_decode($filteredData);
            $fp = fopen('images/pdf/'.$filename, 'wb' );
            fwrite( $fp, $unencodedData);
            fclose( $fp );
        }else{
            return $this->render('saveImage');
        }
    }


    public function actionReport($pid) {
        $this->layout = "@app/themes/basic/layouts/print";
//        $request = Yii::$app->request;
//        $pid = $request->get('pid');

        $model = $this->findModel($pid);
        if(!$model){
            throw new \yii\web\NotFoundHttpException("Không tìm thấy trang này.");
        }
        // get your HTML raw content without any layouts or scripts
        $content = $this->render('report', [
            'model' => $model,
        ]);

//        return $content;

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '
            .pdf-page{font-family: "Times New Roman", Times, serif;}
            table{font-family: "Times New Roman", Times, serif;}
            p{font-size:20px;margin-bottom:30px;}
            span{font-size:18px;}
            .logo-pdf{margin-bottom:150px;margin-top:80px;display:block;width:100%;text-align:center;} 
            .logo-pdf img{display:block;margin:0 auto;} 
            .kv-heading-1{font-size:50px;text-align:center;text-transform:uppercase;color:#FFF;margin-bottom:40px;}
            .project-content{padding-left:50px;margin-bottom:60px;display:block;}
            .project-content p{color: #FFF;text-transform:uppercase;font-size:25px;}
            .footer{color:#FFF;font-size:25px;text-align:center;}
            h2{font-size:30px;text-transform:uppercase;}
            h3{font-size:25px;text-transform:uppercase;}
            .hello{font-weight;bold;margin-bottom:8px;display:block;}
            ',
            // set mPDF properties on the fly
            'options' => ['title' => 'Báo cáo ý tưởng kinh doanh'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Báo cáo ý tưởng kinh doanh'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function report($id){
        $this->layout = "@app/themes/basic/layouts/print";
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $content = $this->render('report', [
            'model' => $model,
        ]);

//        return $content;

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Krajee Report Header'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionTestExport(){
        echo 'aaa';
        $query = ProjectBusinessIdea::find()->where(['status' => 0]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'created_at' => SORT_DESC,
//                    'title' => SORT_ASC,
//                ]
//            ],
        ]);


//        $model = $dataProvider->getModels();
//        if($model){
//            foreach ($model as $m){
//                echo $m->name . "<br />";
//            }
//        }

        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'owner_email',
            ['class' => 'yii\grid\ActionColumn'],
        ];

// Renders a export dropdown menu


        return $this->render('testExport', [
            'dataProvider' => $dataProvider,
            'gridColumns' => $gridColumns,
        ]);
    }
}
