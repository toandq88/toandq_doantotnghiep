<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CauKetcauduoiTru;
use frontend\models\CauKetcauduoiTruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CauKetcauduoiTruController implements the CRUD actions for CauKetcauduoiTru model.
 */
class CauKetcauduoiTruController extends Controller {

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
     * Lists all CauKetcauduoiTru models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauKetcauduoiTruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauKetcauduoiTru model.
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
     * Creates a new CauKetcauduoiTru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CauKetcauduoiTru();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_ketcauduoitru]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcauduoi']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CauKetcauduoiTru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_ketcauduoitru]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcauduoi']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CauKetcauduoiTru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);     //lấy id_cau trước khi xóa để chuyển về trang view chi tiết cầu
        $this->findModel($id)->delete();

        //return $this->redirect(['index']);
        return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcauduoi']);
    }

    /**
     * Finds the CauKetcauduoiTru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauKetcauduoiTru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CauKetcauduoiTru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
