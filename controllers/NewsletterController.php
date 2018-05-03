<?php

namespace ubslum\projectbusinessidea\controllers;

use ubslum\projectbusinessidea\components\MyMailChimp;
use Yii;
use ubslum\projectbusinessidea\models\Newsletter;
use ubslum\projectbusinessidea\models\NewsletterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsletterController implements the CRUD actions for Newsletter model.
 */
class NewsletterController extends Controller
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
     * Lists all Newsletter models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new NewsletterSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single Newsletter model.
     * @param integer $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new Newsletter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $this->layout = "@app/themes/basic/layouts/newsletter";
        $model = new Newsletter();
        $model->phone = '+84';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //send mail
            Yii::$app->mail->compose('newsletter-email', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo($model->email)
                ->setSubject('Bộ tài liệu hướng dẫn Lập Kế hoạch kinh doanh')
                ->send();
            //send mail to contact@remove.vn
            Yii::$app->mail->compose('newsletter-email-contact', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo('contact@remove.vn')
                ->setSubject('Thông báo đăng ký tải ebook')
                ->send();
            return $this->redirect(['view-success', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateA()//no-layout
    {
        $this->layout = "@app/themes/basic/layouts/newsletter";
        $model = new Newsletter();
//        $model->phone = '+84';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //send mail
            Yii::$app->mail->compose('newsletter-email', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo($model->email)
                ->setSubject('Bộ tài liệu hướng dẫn Lập Kế hoạch kinh doanh')
                ->send();
            //send mail to contact@remove.vn
            Yii::$app->mail->compose('newsletter-email-contact', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo('contact@remove.vn')
                ->setSubject('Thông báo đăng ký tải ebook')
                ->send();
            return $this->redirect(['view-success-a', 'id' => $model->id]);
        } else {
            return $this->render('createA', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateB()//no-layout
    {
        $this->layout = "@app/themes/basic/layouts/newsletter";
        $model = new Newsletter();
//        $model->phone = '+84';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //send mail
            Yii::$app->mail->compose('newsletter-email', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo($model->email)
                ->setSubject('Bộ tài liệu hướng dẫn Lập Kế hoạch kinh doanh')
                ->send();
            //send mail to contact@remove.vn
            Yii::$app->mail->compose('newsletter-email-contact', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo('contact@remove.vn')
                ->setSubject($model->fullname . ' (' . $model->email . '-' . $model->phone . ')' . ' vừa đăng ký tải ebook')
                ->send();
            return $this->redirect(['view-success-b', 'id' => $model->id]);
        } else {
            return $this->render('createB', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateC()//no-layout
    {
        $this->layout = "@app/themes/basic/layouts/newsletter";
        $model = new Newsletter();
//        $model->phone = '+84';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //mailchimp
            $mailchimp = new MyMailChimp();
            $mailchimp->addMember($model->fullname, $model->email, $model->phone);
            //send mail
            Yii::$app->mail->compose('newsletter-email', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo($model->email)
                ->setSubject('Bộ tài liệu hướng dẫn Lập Kế hoạch kinh doanh')
                ->send();
            //send mail to contact@remove.vn
            Yii::$app->mail->compose('newsletter-email-contact', ['model' => $model])
                ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "REMOVE Business Consulting"])
                ->setTo('contact@remove.vn')
                ->setSubject($model->fullname . ' (' . $model->email . '-' . $model->phone . ')' . ' vừa đăng ký tải ebook')
                ->send();
            return $this->redirect(['view-success-b', 'id' => $model->id]);
        } else {
            return $this->render('createC', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Newsletter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Newsletter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Newsletter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Newsletter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Newsletter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * alert success
     */
    public function actionViewSuccess(){
        \Yii::$app->getSession()->setFlash('success', 'Vui lòng kiểm tra email, quà tặng sẽ được gửi qua email của bạn trong ít phút.');
        return $this->render('viewSuccess');
    }

    public function actionViewSuccessA(){
        $this->layout = "@app/themes/basic/layouts/newsletter";
        \Yii::$app->getSession()->setFlash('success', 'Vui lòng kiểm tra email, quà tặng sẽ được gửi qua email của bạn trong ít phút.');
        return $this->render('viewSuccessA');
    }

    public function actionViewSuccessB(){
        $this->layout = "@app/themes/basic/layouts/newsletter";
        \Yii::$app->getSession()->setFlash('success', 'Vui lòng kiểm tra email, quà tặng sẽ được gửi qua email của bạn trong ít phút.');
        return $this->render('viewSuccessB');
    }
}
