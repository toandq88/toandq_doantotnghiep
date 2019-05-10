<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cau;
use frontend\models\CauSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
//Chi tiết thông tin cầu
use frontend\models\CauLichsu;
use frontend\models\CauCatngangmatcau;
use frontend\models\CauKetcaunhip;
use frontend\models\CauKetcauduoiMo;
use frontend\models\CauKetcauduoiTru;
use frontend\models\CauGoicau;
use frontend\models\CauKhecogian;
use frontend\models\CauKebaove;
use frontend\models\CauThietbicongcongtrencau;
use frontend\models\CauThongtinduungluc;
use frontend\models\CauChongthamvathoatnuoc;
use frontend\models\CauBaotri;
use frontend\models\CauKiemtra;
use frontend\models\CauHinhanh;

use kartik\mpdf\Pdf;

/**
 * CauController implements the CRUD actions for Cau model.
 */
class CauController extends Controller {

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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'pdf', 'export'], // add all actions to take guest to login page
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
     * Lists all Cau models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CauSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cau model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $lists_lichsu = CauLichsu::getLists($id);
        $lists_catngangmatcau = CauCatngangmatcau::getLists($id);
        $lists_ketcaunhip = CauKetcaunhip::getLists($id);
        $lists_ketcauduoi_mo = CauKetcauduoiMo::getLists($id);
        $lists_ketcauduoi_tru = CauKetcauduoiTru::getLists($id);
        $lists_goicau = CauGoicau::getLists($id);
        $lists_khecogian = CauKhecogian::getLists($id);
        $lists_kebaove = CauKebaove::getLists($id);
        $lists_thietbicongcong = CauThietbicongcongtrencau::getLists($id);
        $lists_thongtinduungluc = CauThongtinduungluc::getLists($id);
        $lists_chongthamvathoatnuoc = CauChongthamvathoatnuoc::getLists($id);
        $lists_lichsusuachua = CauBaotri::getLists($id);
        $lists_kiemtra = CauKiemtra::getLists($id);
        $lists_hinhanh = CauHinhanh::getLists($id);
        $lists_hinhanh_doc = CauHinhanh::getLists_doc($id);
        $lists_hinhanh_ngang = CauHinhanh::getLists_ngang($id);

        $c_lichsu = CauLichsu::getC($id);
        $c_catngangmatcau = CauCatngangmatcau::getC($id);
        $c_ketcaunhip = CauKetcaunhip::getC($id);
        $c_ketcauduoi_mo = CauKetcauduoiMo::getC($id);
        $c_ketcauduoi_tru = CauKetcauduoiTru::getC($id);
        $c_goicau = CauGoicau::getC($id);
        $c_khecogian = CauKhecogian::getC($id);
        $c_kebaove = CauKebaove::getC($id);
        $c_thietbicongcong = CauThietbicongcongtrencau::getC($id);
        $c_thongtinduungluc = CauThongtinduungluc::getC($id);
        $c_chongthamvathoatnuoc = CauChongthamvathoatnuoc::getC($id);
        $c_lichsusuachua = CauBaotri::getC($id);
        $c_kiemtra = CauKiemtra::getC($id);
        $c_hinhanh = CauHinhanh::getC($id);
        $c_sum = $c_lichsu + $c_catngangmatcau + $c_ketcaunhip + $c_ketcauduoi_mo + $c_ketcauduoi_tru + $c_goicau + $c_khecogian + $c_kebaove + $c_thietbicongcong + $c_thongtinduungluc + $c_chongthamvathoatnuoc + $c_lichsusuachua + $c_kiemtra + $c_hinhanh;

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'lists_lichsu' => $lists_lichsu,
                    'lists_catngangmatcau' => $lists_catngangmatcau,
                    'lists_ketcaunhip' => $lists_ketcaunhip,
                    'lists_ketcauduoi_mo' => $lists_ketcauduoi_mo,
                    'lists_ketcauduoi_tru' => $lists_ketcauduoi_tru,
                    'lists_goicau' => $lists_goicau,
                    'lists_khecogian' => $lists_khecogian,
                    'lists_kebaove' => $lists_kebaove,
                    'lists_thietbicongcong' => $lists_thietbicongcong,
                    'lists_thongtinduungluc' => $lists_thongtinduungluc,
                    'lists_chongthamvathoatnuoc' => $lists_chongthamvathoatnuoc,
                    'lists_lichsusuachua' => $lists_lichsusuachua,
                    'lists_kiemtra' => $lists_kiemtra,
                    'lists_hinhanh' => $lists_hinhanh,
                    'lists_hinhanh_doc' => $lists_hinhanh_doc,
                    'lists_hinhanh_ngang' => $lists_hinhanh_ngang,
                    'c_sum' => $c_sum,
        ]);
    }

    /**
     * Creates a new Cau model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Cau();

        if ($model->load(Yii::$app->request->post())) {
            //get the instance of the upload file
            $fileName = $model->id_cau . '-' . date('Y-m-d-his', time());
            $file = UploadedFile::getInstance($model, 'file');

            if (is_dir('uploads/cau-hoso/') && isset($file->extension)) {
                $file->saveAs('uploads/cau-hoso/' . $fileName . '.' . $file->extension);
                //save the path in the db column
                $model->file = $fileName . '.' . $file->extension;
            }

            $model->nguoitao = Yii::$app->user->identity->username;
            $model->ngaytao = date('Y-m-d H:i:s', time());
            $model->nguoisua = Yii::$app->user->identity->username;
            $model->ngaysua = date('Y-m-d H:i:s', time());
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_cau]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cau model.
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
            $ngaytao = str_replace(' ', '-', $model->ngaytao);
            $ngaytao = str_replace(':', '', $ngaytao);
            $fileName = $model->id_cau . '-' . $ngaytao;
            $file = UploadedFile::getInstance($model, 'file');

            if (is_dir('uploads/cau-hoso/') && isset($file->extension)) {
                $file->saveAs('uploads/cau-hoso/' . $fileName . '.' . $file->extension);
                //save the path in the db column
                $model->file = $fileName . '.' . $file->extension;
            } else {
                $model->file = $file_exist;
            }

            $model->nguoisua = Yii::$app->user->identity->username;
            $model->ngaysua = date('Y-m-d H:i:s', time());
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_cau]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cau model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Cau model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cau the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Cau::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Export to PDF
    public function actionPdf($id) {
        $lists_lichsu = CauLichsu::getLists($id);
        $lists_catngangmatcau = CauCatngangmatcau::getLists($id);
        $lists_ketcaunhip = CauKetcaunhip::getLists($id);
        $lists_ketcauduoi_mo = CauKetcauduoiMo::getLists($id);
        $lists_ketcauduoi_tru = CauKetcauduoiTru::getLists($id);
        $lists_goicau = CauGoicau::getLists($id);
        $lists_khecogian = CauKhecogian::getLists($id);
        $lists_kebaove = CauKebaove::getLists($id);
        $lists_thietbicongcong = CauThietbicongcongtrencau::getLists($id);
        $lists_thongtinduungluc = CauThongtinduungluc::getLists($id);
        $lists_chongthamvathoatnuoc = CauChongthamvathoatnuoc::getLists($id);
        $lists_lichsusuachua = CauBaotri::getLists($id);
        $lists_kiemtra = CauKiemtra::getLists($id);
        $lists_hinhanh = CauHinhanh::getLists($id);
        $lists_hinhanh_doc = CauHinhanh::getLists_doc($id);
        $lists_hinhanh_ngang = CauHinhanh::getLists_ngang($id);

        $pdf_content = $this->renderPartial('view-pdf', [
                    'model' => $this->findModel($id),
                    'lists_lichsu' => $lists_lichsu,
                    'lists_catngangmatcau' => $lists_catngangmatcau,
                    'lists_ketcaunhip' => $lists_ketcaunhip,
                    'lists_ketcauduoi_mo' => $lists_ketcauduoi_mo,
                    'lists_ketcauduoi_tru' => $lists_ketcauduoi_tru,
                    'lists_goicau' => $lists_goicau,
                    'lists_khecogian' => $lists_khecogian,
                    'lists_kebaove' => $lists_kebaove,
                    'lists_thietbicongcong' => $lists_thietbicongcong,
                    'lists_thongtinduungluc' => $lists_thongtinduungluc,
                    'lists_chongthamvathoatnuoc' => $lists_chongthamvathoatnuoc,
                    'lists_lichsusuachua' => $lists_lichsusuachua,
                    'lists_kiemtra' => $lists_kiemtra,
                    'lists_hinhanh' => $lists_hinhanh,
                    'lists_hinhanh_doc' => $lists_hinhanh_doc,
                    'lists_hinhanh_ngang' => $lists_hinhanh_ngang,
        ]);
        
        
        

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
            'content' => $pdf_content,  
            'marginLeft' => 20,
            'filename' => 'Ho-so-ly-lich-cau.pdf',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            //'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Hồ sơ cầu'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Hồ sơ Lý lịch cầu'], 
                'SetFooter'=>['{PAGENO}'],
                'SetTitle'=>['Xuất bản Hồ sơ Lý lịch cầu'], 
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
    
    public function actionExport() {
        $searchModel = new CauSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('export', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
}
