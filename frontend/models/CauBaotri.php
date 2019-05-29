<?php

namespace frontend\models;

use Yii;
use frontend\models\Donvi;
use frontend\models\MucDoBaoTri;
use frontend\models\Cau;

/**
 * This is the model class for table "tb_cau_baotri".
 *
 * @property int $id_baotri
 * @property int $id_cau
 * @property int $id_kiemtra
 * @property string $ngaybatdau
 * @property string $ngayketthuc
 * @property int $id_mucdobaotri
 * @property string $noidung
 * @property double $giatri
 * @property int $id_donvithuchien
 * @property string $file
 * @property int $nguoitao
 * @property string $ngaytao
 * @property int $nguoisua
 * @property string $ngaysua
 */
class CauBaotri extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_cau_baotri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_cau', 'ngaybatdau', 'ngayketthuc', 'id_mucdobaotri', 'noidung', 'giatri', 'id_donvithuchien', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua'], 'required'],
            [['id_cau', 'id_kiemtra', 'id_mucdobaotri', 'id_donvithuchien'], 'integer'],
            [['ngaybatdau', 'ngayketthuc', 'ngaytao', 'ngaysua'], 'safe'],
            [['noidung', 'ghichu'], 'string'],
            [['giatri'], 'number'],
            [['file'], 'string', 'max' => 200],
            [['hinhanh'], 'string', 'max' => 255],
            [['nguoitao', 'nguoisua'], 'string', 'max' => 50],
            [['file'],'file','extensions'=>'pdf'],
            [['hinhanh'],'image','extensions'=>'jpg,png,gif', 'maxSize' => 1024*1024*10, 'minWidth' => 100, 'minHeight' => 100],   //10Mb
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_baotri' => 'ID',
            'id_cau' => 'Cầu',
            'id_kiemtra' => 'Cho đợt kiểm tra',
            'ngaybatdau' => 'Ngày bắt đầu',
            'ngayketthuc' => 'Ngày kết thúc',
            'id_mucdobaotri' => 'Mức độ bảo trì',
            'noidung' => 'Nội dung',
            'giatri' => 'Giá trị',
            'id_donvithuchien' => 'Đơn vị thực hiện',
            'file' => 'Hồ sơ sửa chữa',
            'hinhanh' => 'Hình ảnh',
            'ghichu' => 'Ghi chú',
            'nguoitao' => 'Người tạo',
            'ngaytao' => 'Ngày tạo',
            'nguoisua' => 'Người cập nhật',
            'ngaysua' => 'Ngày cập nhật',
        ];
    }

    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Lấy tên mức độ bảo trì
    public function getDotkiemtra() {
        return $this->hasOne(CauKiemtra::className(), ['id_kiemtra' => 'id_kiemtra']);
    }
    
    //Lấy tên đơn vị kiểm tra
    public function getDonvi() {
        return $this->hasOne(Donvi::className(), ['id_donvi' => 'id_donvithuchien']);
    }

    //Lấy tên mức độ bảo trì
    public function getMucdo() {
        return $this->hasOne(MucDoBaoTri::className(), ['id_mucdo' => 'id_mucdobaotri']);
    }

    //Lấy tổng số thông tin bảo trì cho vào - site/index
    public function getCountBaotri() {
        return CauBaotri::find()->where([])->count();
    }
    
    //Cầu - Lịch sử sửa chữa
    public function getLists($id) {
        return CauBaotri::find()->where(['id_cau' => $id])->all();
    }

    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauBaotri::find()->where(['id_cau' => $id])->count();
    }
    
    //Lấy 8 thông tin bảo trì mới nhất
    public function getTop5() {
        return CauBaotri::find()->where([])->limit(6)->orderBy(['id_baotri' => SORT_DESC])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa người dùng
    public function getU($username) {
        return CauBaotri::find()->where(['nguoitao' => $username])->orWhere(['nguoisua' => $username])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa đơn vị
    public function getD($id) {
        return CauBaotri::find()->where(['id_donvithuchien' => $id])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa mức độ bảo trì
    public function getM($id) {
        return CauBaotri::find()->where(['id_mucdobaotri' => $id])->count();
    }
}
