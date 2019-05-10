<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CauBaotri;
use frontend\models\CauBaotriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use frontend\models\CauKiemtra;

/**
 * CauBaotriController implements the CRUD actions for CauBaotri model.
 */
class CauBaotriController extends Controller {

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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'export'], // add all actions to take guest to login page
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
     * Lists all CauBaotri models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauBaotriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauBaotri model.
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
     * Creates a new CauBaotri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CauBaotri();

        if ($model->load(Yii::$app->request->post())) {
            //upload file
            $fileName = $model->id_cau . '-' . date('Ymdhis', time()) . '-' . rand(111, 999);
            $file = UploadedFile::getInstance($model, 'file');

            if (is_dir('uploads/baotri-hoso/') && isset($file->extension)) {
                $file->saveAs('uploads/baotri-hoso/' . $fileName . '.' . $file->extension);
                //save the path in the db column
                $model->file = $fileName . '.' . $file->extension;
            }

            //upload hình ảnh
            $imageName = $model->id_cau . '-' . date('Ymdhis', time()) . '-' . rand(111, 999);
            $file2 = UploadedFile::getInstance($model, 'hinhanh');

            if (is_dir('uploads/images/cau-baotri/') && isset($file2->extension)) {
                $file2->saveAs('uploads/images/cau-baotri/' . $imageName . '.' . $file2->extension);
                //save the path in the db column
                $model->hinhanh = $imageName . '.' . $file2->extension;
            }

            $model->nguoitao = Yii::$app->user->identity->username;
            $model->ngaytao = date('Y-m-d H:i:s', time());
            $model->nguoisua = Yii::$app->user->identity->username;
            $model->ngaysua = date('Y-m-d H:i:s', time());
            $model->save();

            if ($model->id_kiemtra != '') {                 //Cập nhật tình trạng đã sửa chữa cho thông tin kiểm tra
                $connection = Yii::$app->db;
                $command = $connection->createCommand('UPDATE tb_cau_kiemtra SET cansuachua = 2 WHERE id_kiemtra = '.$model->id_kiemtra.'');
                $command->execute();
            }
            //return $this->redirect(['view', 'id' => $model->id_baotri]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'lichsusuachua']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CauBaotri model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $file_exist = $model->file;
        $file_exist2 = $model->hinhanh;

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');
            if (is_dir('uploads/baotri-hoso/') && isset($file->extension) && $file_exist != null) {             //Nếu có upload file mới và đã có file cũ
                $fileName = substr($file_exist, 0, strlen($file_exist) - 4);    //lấy tên file cũ
                $directory = 'uploads\baotri-hoso\\' . $file_exist;             //đường dẫn chứa file cũ
                @unlink($directory);                                             //Xóa file cũ
                $file->saveAs('uploads/baotri-hoso/' . $fileName . '.' . $file->extension);
                //save the path in the db column
                $model->file = $fileName . '.' . $file->extension;
            } else if (is_dir('uploads/baotri-hoso/') && isset($file->extension) && $file_exist == null) {
                $fileName = $model->id_cau . '-' . date('Ymdhis', time()) . '-' . rand(111, 999); //đặt tên cho file
                $file->saveAs('uploads/baotri-hoso/' . $fileName . '.' . $file->extension); //upload file mới
                $model->file = $fileName . '.' . $file->extension;   //lấy tên file mới để lưu db
            } else {
                $model->file = $file_exist;
            }

            $file2 = UploadedFile::getInstance($model, 'hinhanh');
            if (is_dir('uploads/images/cau-baotri/') && isset($file2->extension) && $file_exist2 != null) {     //Nếu có upload hình ảnh mới và đã có ảnh cũ
                $imageName = substr($file_exist2, 0, strlen($file_exist2) - 4);   //lấy tên file cũ
                $directory = 'uploads\images\cau-baotri\\' . $file_exist2;            //đường dẫn chứa file cũ
                @unlink($directory);                                             //Xóa file cũ
                $file2->saveAs('uploads/images/cau-baotri/' . $imageName . '.' . $file2->extension);     //upload file mới
                $model->hinhanh = $imageName . '.' . $file2->extension;   //lấy tên file mới để lưu db
            } else if (is_dir('uploads/images/cau-baotri/') && isset($file2->extension) && $file_exist2 == null) {    //Nếu có upload hình ảnh mới và không có ảnh cũ
                $imageName = $model->id_cau . '-' . date('Ymdhis', time()); //đặt tên cho file
                $file2->saveAs('uploads/images/cau-baotri/' . $imageName . '.' . $file2->extension); //upload file mới
                $model->hinhanh = $imageName . '.' . $file2->extension;   //lấy tên file mới để lưu db
            } else {
                $model->hinhanh = $file_exist2;
            }
            //còn không làm gì thì giữ nguyên

            $model->nguoisua = Yii::$app->user->identity->username;
            $model->ngaysua = date('Y-m-d H:i:s', time());
            $model->save();

            //return $this->redirect(['view', 'id' => $model->id_baotri]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'lichsusuachua']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CauBaotri model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $file_exist = $model->file;
        $file_exist2 = $model->hinhanh;
        $this->findModel($id)->delete();

        if ($file_exist != '') {        //Xóa file ảnh đại diện nếu có
            $directory = 'uploads\baotri-hoso\\' . $file_exist;
            @unlink($directory);
        }

        if ($file_exist2 != '') {        //Xóa file ảnh đại diện nếu có
            $directory = 'uploads\images\cau-baotri\\' . $file_exist2;
            @unlink($directory);
        }

        if ($model->id_kiemtra != '') {                 //Cập nhật tình trạng chưa sửa chữa cho thông tin kiểm tra
            $connection = Yii::$app->db;
            $command = $connection->createCommand('UPDATE tb_cau_kiemtra SET cansuachua = 1 WHERE id_kiemtra = '.$model->id_kiemtra.'');
            $command->execute();
        }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the CauBaotri model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauBaotri the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CauBaotri::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Trang bạn yêu cầu không tồn tại.');
    }

    public function actionExport() {
        $searchModel = new CauBaotriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('export', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
}
