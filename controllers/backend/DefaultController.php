<?php
namespace kouosl\Appointment\controllers\backend;

use Yii;
use kouosl\Appointment\models\Appointment;
use kouosl\Appointment\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\Swiftmailer\Mailer;

/**
 * Default controller for the `Appointment` module
 */
class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
  /**
   * {@inheritdoc}
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
   * Lists all Appointment models.
   * @return mixed
   */
  public function actionIndex()
  {
      $searchModel = new AppointmentSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
  }

  /**
   * Displays a single Appointment model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
      return $this->render('view', [
          'model' => $this->findModel($id),
      ]);
  }

  /**
   * Creates a new Appointment model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
      $model = new Appointment();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->appointment_id]);
      }

      return $this->render('create', [
          'model' => $model,
      ]);
  }

  /**
   * Updates an existing Appointment model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($id)
  {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->appointment_status) {
          Yii::$app->mailer->compose()
                          ->setTo($model->appointment_email)
                          ->setFrom('onurtaskiran.randevu@gmail.com')
                          ->setSubject('Randevu Onayı')
                          ->setTextBody('Randevunuz Onaylanmıştır.')
                          ->send();
          return $this->redirect(['view', 'id' => $model->appointment_id]);
        }
        else {
          Yii::$app->mailer->compose()
                          ->setTo($model->appointment_email)
                          ->setFrom('onurtaskiran.randevu@gmail.com')
                          ->setSubject('Randevu Onayı')
                          ->setTextBody('Randevunuzun iptal edilmiştir. Lütfen yeni bir randevu almayı deneyiniz.')
                          ->send();
          return $this->redirect(['view', 'id' => $model->appointment_id]);
        }
      }

      return $this->render('update', [
          'model' => $model,
      ]);
  }

  /**
   * Deletes an existing Appointment model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($id)
  {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
  }

  /**
   * Finds the Appointment model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Appointment the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
      if (($model = Appointment::findOne($id)) !== null) {
          return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
  }
}
