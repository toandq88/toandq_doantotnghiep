<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_ketcaunhip".
 *
 * @property int $id_ketcaunhip
 * @property int $id_cau
 * @property string $kyhieunhip
 * @property int $doccau_sodoketcau
 * @property int $doccau_dangketcau
 * @property int $doccau_chieudainhip
 * @property int $doccau_culytimgoi
 * @property int $doccau_loaivuot
 * @property int $doccau_loaimatduongtrencau
 * @property int $doccau_vatlieuduongbohanh
 * @property int $doccau_vatlieulancantayvin
 * @property int $ngangcau_dangdamchu
 * @property int $ngangcau_sodamchu
 * @property double $ngangcau_culydam
 * @property double $ngangcau_chieucaodamchu
 * @property int $ngangcau_dangdamngang
 * @property string $ngangcau_dangdamdocphu
 * @property int $ngangcau_loaibanmatcau
 * @property int $ngangcau_dangketcauvom
 * @property string file
 */
class CauKetcaunhip extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_cau_ketcaunhip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_cau', 'kyhieunhip', 'doccau_sodoketcau', 'doccau_dangketcau', 'doccau_chieudainhip', 'doccau_culytimgoi', 'doccau_loaivuot', 'doccau_loaimatduongtrencau', 'doccau_vatlieuduongbohanh', 'doccau_vatlieulancantayvin', 'ngangcau_dangdamchu', 'ngangcau_sodamchu', 'ngangcau_culydam', 'ngangcau_chieucaodamchu', 'ngangcau_dangdamngang', 'ngangcau_dangdamdocphu', 'ngangcau_loaibanmatcau', 'ngangcau_dangketcauvom'], 'required'],
            [['id_cau', 'doccau_sodoketcau', 'doccau_dangketcau', 'doccau_chieudainhip', 'doccau_culytimgoi', 'doccau_loaivuot', 'doccau_loaimatduongtrencau', 'doccau_vatlieuduongbohanh', 'doccau_vatlieulancantayvin', 'ngangcau_dangdamchu', 'ngangcau_sodamchu', 'ngangcau_dangdamngang', 'ngangcau_loaibanmatcau', 'ngangcau_dangketcauvom'], 'integer'],
            [['ngangcau_culydam', 'ngangcau_chieucaodamchu'], 'number'],
            [['kyhieunhip', 'ngangcau_dangdamdocphu'], 'string', 'max' => 100],
            [['file'], 'image', 'extensions' => 'jpg,png,gif', 'maxSize' => 1024 * 1024 * 10, 'minWidth' => 100, 'minHeight' => 100], //10Mb
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_ketcaunhip' => 'ID',
            'id_cau' => 'Cầu',
            'kyhieunhip' => 'Ký hiệu nhịp',
            'doccau_sodoketcau' => 'Sơ đồ kết cấu dọc cầu',
            'doccau_dangketcau' => 'Dạng kết cấu',
            'doccau_chieudainhip' => 'Chiều dài nhịp (m)',
            'doccau_culytimgoi' => 'Cự ly tim gối (m)',
            'doccau_loaivuot' => 'Loại vượt',
            'doccau_loaimatduongtrencau' => 'Loại mặt đường trên cầu',
            'doccau_vatlieuduongbohanh' => 'Vật liệu đường bộ hành',
            'doccau_vatlieulancantayvin' => 'Vật liệu lan can tay vịn',
            'ngangcau_dangdamchu' => 'Dạng dầm chủ',
            'ngangcau_sodamchu' => 'Số dầm chủ',
            'ngangcau_culydam' => 'Cự ly dầm (m)',
            'ngangcau_chieucaodamchu' => 'Chiều cao dầm chủ (mm)',
            'ngangcau_dangdamngang' => 'Dạng dầm ngang',
            'ngangcau_dangdamdocphu' => 'Dạng dầm dọc phụ',
            'ngangcau_loaibanmatcau' => 'Loại bản mặt cầu',
            'ngangcau_dangketcauvom' => 'Dạng kết cấu vòm',
            'file' => 'Ảnh sơ họa cắt ngang',
        ];
    }

    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }

    //Lấy tên sơ đồ kết cấu dọc cầu
    public function getLoaisodoketcau() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_sodoketcau']);
    }

    //Lấy tên dạng kết cấu dọc cầu
    public function getLoaidangketcau() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_dangketcau']);
    }

    //Lấy tên loại vượt - kết cấu dọc cầu
    public function getLoaivuot() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_loaivuot']);
    }

    //Lấy tên loại mặt đường trên cầu - kết cấu dọc cầu
    public function getLoaimatduongtrencau() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_loaimatduongtrencau']);
    }

    //Lấy tên loại vật liệu đường bộ hành trên cầu - kết cấu dọc cầu
    public function getLoaivatlieuduongbohanh() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_vatlieuduongbohanh']);
    }

    //Lấy tên loại vật liệu lan can tay vịn - kết cấu dọc cầu
    public function getLoaivatlieulancantayvin() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doccau_vatlieulancantayvin']);
    }

    //Lấy tên loại dạng dầm chủ - xem chi tiết
    public function getDangdamchu() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'ngangcau_dangdamchu']);
    }

    //Lấy tên loại dạng dầm ngang - xem chi tiết
    public function getDangdamngang() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'ngangcau_dangdamngang']);
    }

    //Lấy tên loại bản mặt cầu - xem chi tiết
    public function getLoaibanmatcau() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'ngangcau_loaibanmatcau']);
    }

    //Lấy tên loại bản mặt cầu - xem chi tiết
    public function getDangketcauvom() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'ngangcau_dangketcauvom']);
    }

    //Kết cấu nhịp - cau/view
    public function getLists($id) {
        return CauKetcaunhip::find()->where(['id_cau' => $id])->all();
    }

    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKetcaunhip::find()->where(['id_cau' => $id])->count();
    }

}
