<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CauThietbicongcongtrencau;
use frontend\models\CauThietbicongcongtrencauSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CauThietbicongcongtrencauController implements the CRUD actions for CauThietbicongcongtrencau model.
 */
class CauThietbicongcongtrencauController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'as access' => [
                'class' => AccessControl::className(), //AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'], // add all actions to take guest to login page
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CauThietbicongcongtrencau models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauThietbicongcongtrencauSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauThietbicongcongtrencau model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CauThietbicongcongtrencau model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CauThietbicongcongtrencau();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_thietbicongcong]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'thietbicongcong']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CauThietbicongcongtrencau model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_thietbicongcong]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'thietbicongcong']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CauThietbicongcongtrencau model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);     //lấy id_cau trước khi xóa để chuyển về trang view chi tiết cầu
        $this->findModel($id)->delete();

        //return $this->redirect(['index']);
        return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'thietbicongcong']);
    }

    /**
     * Finds the CauThietbicongcongtrencau model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauThietbicongcongtrencau the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CauThietbicongcongtrencau::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
