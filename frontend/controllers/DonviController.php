<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Donvi;
use frontend\models\DonviSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use frontend\models\Tuyenduong;
use frontend\models\CauBaotri;
use frontend\models\CauKiemtra;

/**
 * DonviController implements the CRUD actions for Donvi model.
 */
class DonviController extends Controller {

    /**
     * @inheritdoc
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
     * Lists all Donvi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DonviSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donvi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $d_tuyenduong = Tuyenduong::getD($id);
        $d_kiemtra = CauKiemtra::getD($id);
        $d_baotri = CauBaotri::getD($id);
        $d_sum = $d_tuyenduong + $d_kiemtra + $d_baotri;
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'd_sum' => $d_sum,
        ]);
    }

    /**
     * Creates a new Donvi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Donvi();
        $model->ngaytao = time();
        if ($model->load(Yii::$app->request->post())) {

            //get the instance of the upload file
            $imageName = $model->tenviettat . '-' . date('Ymdhis', time());
            $model->file = UploadedFile::getInstance($model, 'hinhanh');

            if (is_dir('uploads/images/donvi/') && isset($model->file->extension)) {
                $model->file->saveAs('uploads/images/donvi/' . $imageName . '.' . $model->file->extension);
                //save the path in the db column
                $model->hinhanh = $imageName . '.' . $model->file->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_donvi]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Donvi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $file_exist = $model->hinhanh;

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'hinhanh');

            if (is_dir('uploads/images/donvi/') && isset($model->file->extension) && $file_exist != null) {    //Nếu có upload hình ảnh mới và đã có ảnh cũ
                $imageName = substr($file_exist, 0, strlen($file_exist) - 4);   //lấy tên file cũ
                $directory = 'uploads\images\donvi\\' . $file_exist;            //đường dẫn chứa file cũ
                @unlink($directory);                                             //Xóa file cũ
                $model->file->saveAs('uploads/images/donvi/' . $imageName . '.' . $model->file->extension);     //upload file mới
                $model->hinhanh = $imageName . '.' . $model->file->extension;   //lấy tên file mới để lưu db
            } else if (is_dir('uploads/images/donvi/') && isset($model->file->extension) && $file_exist == null) {    //Nếu có upload hình ảnh mới và không có ảnh cũ
                $imageName = $model->tenviettat . '-' . date('Ymdhis', time()); //đặt tên cho file
                $model->file->saveAs('uploads/images/donvi/' . $imageName . '.' . $model->file->extension); //upload file mới
                $model->hinhanh = $imageName . '.' . $model->file->extension;   //lấy tên file mới để lưu db
            } else { //còn không làm gì thì giữ nguyên
                $model->hinhanh = $file_exist;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_donvi]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Donvi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $file_exist = $model->hinhanh;
        $this->findModel($id)->delete();

        if ($file_exist != '') {        //Xóa file ảnh đại diện nếu có
            $directory = 'uploads\images\donvi\\' . $file_exist;
            @unlink($directory);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Donvi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donvi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Donvi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
