<?php

namespace frontend\models;

use Yii;
use frontend\models\Donvi;
use frontend\models\MucDoKiemTra;
use frontend\models\Cau;

/**
 * This is the model class for table "tb_cau_kiemtra".
 *
 * @property int $id_kiemtra
 * @property int $id_cau
 * @property int $id_donvikiemtra
 * @property string $ngaykiemtra
 * @property int $id_mucdokiemtra
 * @property string $noidung
 * @property string $ketluan
 * @property int $cansuachua
 * @property string $nguoitao
 * @property string $ngaytao
 * @property string $nguoisua
 * @property string $ngaysua
 *
 * @property TbCauBaotri $kiemtra
 */
class CauKiemtra extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tb_cau_kiemtra';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_cau', 'id_donvikiemtra', 'ngaykiemtra', 'id_mucdokiemtra', 'noidung', 'ketluan', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua'], 'required', 'message' => 'Vui lòng nhập thông tin {attribute}.'],
            [['id_cau', 'id_donvikiemtra', 'id_mucdokiemtra'], 'integer'],
            [['ngaykiemtra', 'ngaytao', 'ngaysua'], 'safe'],
            [['noidung', 'ketluan'], 'string'],
            [['file'], 'string', 'max' => 200],
            [['cansuachua'], 'string', 'max' => 2],
            [['nguoitao', 'nguoisua'], 'string', 'max' => 50],
            [['hinhanh'], 'string', 'max' => 255],
            [['file'],'file','extensions'=>'pdf'],
            [['hinhanh'],'image','extensions'=>'jpg,png,gif', 'maxSize' => 1024*1024*10, 'minWidth' => 100, 'minHeight' => 100],   //10Mb
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_kiemtra' => 'ID',
            'id_cau' => 'Cầu',
            'id_donvikiemtra' => 'Đơn vị kiểm tra',
            'ngaykiemtra' => 'Ngày kiểm tra',
            'id_mucdokiemtra' => 'Mức độ kiểm tra',
            'noidung' => 'Nội dung',
            'ketluan' => 'Kết luận',
            'hinhanh' => 'Hình ảnh',
            'file' => 'Hồ sơ kiểm tra',
            'cansuachua' => 'Cần sửa chữa',
            'nguoitao' => 'Người tạo',
            'ngaytao' => 'Ngày tạo',
            'nguoisua' => 'Người sửa',
            'ngaysua' => 'Ngày sửa',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Lấy tên đơn vị kiểm tra
    public function getDonvi() {
        return $this->hasOne(Donvi::className(), ['id_donvi' => 'id_donvikiemtra']);
    }
    
    //Lấy tên mức độ kiểm tra
    public function getMucdo() {
        return $this->hasOne(MucDoKiemTra::className(), ['id_mucdo' => 'id_mucdokiemtra']);
    }
    
    //Lấy tổng số thông tin kiểm tra cho vào - site/index
    public function getCountKiemtra() {
        return CauKiemtra::find()->where([])->count();
    }
    
    //Cầu - Lịch sử kiểm tra
    public function getLists($id) {
        return CauKiemtra::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKiemtra::find()->where(['id_cau' => $id])->count();
    }
    
    //Lấy 8 thông tin bảo trì mới nhất
    public function getTop5() {
        return CauKiemtra::find()->where([])->limit(4)->orderBy(['id_kiemtra' => SORT_DESC])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa người dùng
    public function getU($username) {
        return CauKiemtra::find()->where(['nguoitao' => $username])->orWhere(['nguoisua' => $username])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa đơn vị
    public function getD($id) {
        return CauKiemtra::find()->where(['id_donvikiemtra' => $id])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa mức độ kiểm tra
    public function getM($id) {
        return CauKiemtra::find()->where(['id_mucdokiemtra' => $id])->count();
    }
}
