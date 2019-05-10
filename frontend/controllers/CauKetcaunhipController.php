<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\FileHelper;
use frontend\models\CauKetcaunhip;
use frontend\models\CauKetcaunhipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * CauKetcaunhipController implements the CRUD actions for CauKetcaunhip model.
 */
class CauKetcaunhipController extends Controller {

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
     * Lists all CauKetcaunhip models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauKetcaunhipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauKetcaunhip model.
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
     * Creates a new CauKetcaunhip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CauKetcaunhip();
        if ($model->load(Yii::$app->request->post())) {

            //get the instance of the upload file
            $imageName = $model->id_ketcaunhip . '-KCN-' . date('Ymdhis', time()) . '-' . rand(111, 999);
            $model->file = UploadedFile::getInstance($model, 'file');

            if (is_dir('uploads/images/cau-ketcaunhip/') && isset($model->file->extension)) {
                $model->file->saveAs('uploads/images/cau-ketcaunhip/' . $imageName . '.' . $model->file->extension);
                //save the path in the db column
                $model->file = $imageName . '.' . $model->file->extension;
            }

            $model->save();
            //return $this->redirect(['view', 'id' => $model->id_ketcaunhip]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcaunhip']);
        }
        return $this->render('create', [
                    'model' => $model,
                        ]
        );
    }

    /**
     * Updates an existing CauKetcaunhip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $file_exist = $model->file;

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            if (is_dir('uploads/images/cau-ketcaunhip/') && isset($file->extension) && $file_exist != null) {    //Nếu có upload hình ảnh mới và đã có ảnh cũ
                $imageName = substr($file_exist, 0, strlen($file_exist) - 4);   //lấy tên file cũ
                $directory = 'uploads\images\cau-ketcaunhip\\' . $file_exist;            //đường dẫn chứa file cũ
                @unlink($directory);                                             //Xóa file cũ
                $file->saveAs('uploads/images/cau-ketcaunhip/' . $imageName . '.' . $file->extension);     //upload file mới
                $model->file = $imageName . '.' . $file->extension;   //lấy tên file mới để lưu db
            } else if (is_dir('uploads/images/cau-ketcaunhip/') && isset($file->extension) && $file_exist == null) {    //Nếu có upload hình ảnh mới và không có ảnh cũ
                $imageName = $model->id_ketcaunhip . '-KCN-' . date('Ymdhis', time()) . '-' . rand(111, 999); //đặt tên cho file
                $file->saveAs('uploads/images/cau-ketcaunhip/' . $imageName . '.' . $file->extension); //upload file mới
                $model->file = $imageName . '.' . $file->extension;   //lấy tên file mới để lưu db
            } else{ //còn không làm gì thì giữ nguyên
                $model->file = $file_exist;
            }

            $model->save();
            //return $this->redirect(['view', 'id' => $model->id_ketcaunhip]);
            return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcaunhip']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CauKetcaunhip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);     //lấy id_cau trước khi xóa để chuyển về trang view chi tiết cầu
        $this->findModel($id)->delete();

        $file_exist = $model->file;         //Lấy tên file đính kèm
        if ($file_exist != '') {    //Đã tồn tại file
            $directory = 'uploads\images\cau-ketcaunhip\\' . $file_exist;
            @unlink($directory);
        }
        //return $this->redirect(['index']);
        return $this->redirect(['cau/view', 'id' => $model->id_cau, '#' => 'ketcaunhip']);
    }

    /**
     * Finds the CauKetcaunhip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauKetcaunhip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CauKetcaunhip::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
