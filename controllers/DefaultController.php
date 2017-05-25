<?php

namespace ubslum\projectbusinessidea\controllers;

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
        $items = [];
        foreach ($question as $index=>$q){
            $group = ChoiceQuestionGroup::findOne($q->id_group);
            $label = $index+1;
            $items[] = ['label' => $label , 'content' => $this->renderPartial('_question', array('group' => $group, 'question' => $q,)),];
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
//            \Yii::$app->getSession()->setFlash('success', 'Báo cáo đã hoàn thành.');
            return $this->redirect(['view-success']);
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
        echo 'aaa';
        $this->render('test');
    }



    /**
     * alert success
     */
    public function actionViewSuccess(){
        \Yii::$app->getSession()->setFlash('success', 'Báo cáo đã hoàn thành.');
        return $this->render('viewSuccess');
    }

    use kartik\mpdf\Pdf;
    public function actionReport() {
        $model = $this->findModel(3);
        // get your HTML raw content without any layouts or scripts
        $content = $this->render('view', [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
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
}
