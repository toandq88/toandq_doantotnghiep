<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CauHinhanh;
use frontend\models\CauHinhanhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * CauHinhanhController implements the CRUD actions for CauHinhanh model.
 */
class CauHinhanhController extends Controller {

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
     * Lists all CauHinhanh models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauHinhanhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauHinhanh model.
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
     * Creates a new CauHinhanh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CauHinhanh();
        $model->scenario = "create";    //Chỉ required khi tạo mới
        
        if ($model->load(Yii::$app->request->post())) {
            //get the instance of the upload file
            $imageName = 'vecm-' . date('Ymdhis', time()) . '_' . rand(111, 999);
            $model->file = UploadedFile::getInstance($model, 'file');
            //var_dump($model->file);die();

            if (is_dir('uploads/images/cau/') && isset($model->file->extension)) {
                $model->file->saveAs('uploads/images/cau/' . $imageName . '.' . $model->file->extension);
                //save the path in the db column
                $model->file = $imageName . '.' . $model->file->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_hinhanh]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CauHinhanh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $file_exist = $model->file;

        if ($model->load(Yii::$app->request->post())) {
            //get the instance of the upload file
            if ($file_exist != '') {
                $imageName = substr($file_exist, 0, strlen($file_exist) - 4);
                $directory = 'uploads\images\cau\\' . $file_exist;
                @unlink($directory);     //Xóa file ảnh đại diện nếu có
            } else {
                $imageName = 'vecm-' . date('Ymdhis', time()) . '_' . rand(111, 999);
            }

            $model->file = UploadedFile::getInstance($model, 'file');

            if (is_dir('uploads/images/cau/') && isset($model->file->extension)) {
                $model->file->saveAs('uploads/images/cau/' . $imageName . '.' . $model->file->extension);
                //save the path in the db column
                $model->file = $imageName . '.' . $model->file->extension;
            } else {
                $model->file = $file_exist;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_hinhanh]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CauHinhanh model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);     //lấy id_cau trước khi xóa để chuyển về trang view chi tiết cầu
        $file_exist = $model->file;
        $this->findModel($id)->delete();

        if ($file_exist != '') {
            $directory = 'uploads\images\cau\\' . $file_exist;
            @unlink($directory);     //Xóa file nếu có
        }

        //return $this->redirect(['index']);
        return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'hosoanh']);
    }

    /**
     * Finds the CauHinhanh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauHinhanh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CauHinhanh::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
