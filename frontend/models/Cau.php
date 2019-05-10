<?php

namespace frontend\models;

use Yii;
use frontend\models\Tuyenduong;
use frontend\models\CauThongtinchung;
use frontend\models\VnTinh;
use frontend\models\VnHuyen;
use frontend\models\VnXa;

/**
 * This is the model class for table "tb_cau".
 *
 * @property int $id_cau
 * @property int $id_tuyenduong
 * @property string $sohieu
 * @property string $ten
 * @property int $doituongvuot
 * @property string $tensongsuoi
 * @property double $gocgiao
 * @property int $kmchinh
 * @property int $kmle
 * @property string $vido
 * @property string $kinhdo
 * @property string $id_tinh
 * @property string $id_huyen
 * @property string $id_xa
 * @property int $loailanduong
 * @property int $dangcau
 * @property double $chieudai
 * @property double $sonhip
 * @property string $sodonhip
 * @property double $berongcau
 * @property double $berongphanxechay
 * @property double $berongphanbohanh
 * @property double $taitrongthietke
 * @property string $theoquytrinh
 * @property int $namxaydung
 * @property double $taitrongkhaithac
 * @property int $namduavaokhaithac
 * @property int $chaychungvoi_duongsat
 * @property int $chaychungvoi_congtrinhthuyloi
 * @property string $donvixaydungcau
 * @property double $tinhkhong_vemuakho
 * @property double $tinhkhong_vemualu
 * @property double $tinhkhong_codinh
 * @property double $tinhkhong_thongthuyen
 * @property double $tinhkhong_trencau
 * @property int $bienbao_tencau
 * @property double $bienbao_taitrong
 * @property double $bienbao_tocdo
 * @property double $bienbao_culyxe
 * @property double $bienbao_chieucao
 * @property double $bienbao_chieurong
 * @property string $bienbao_khac
 * @property double $dongchay_thuytrieu
 * @property int $dongchay_nhiemman
 * @property int $dongchay_lulut
 * @property int $dongchay_thongthuyen
 * @property int $dongchay_capsong
 * @property string $dongchay_thoikylu
 * @property string $file
 * @property string $nguoitao
 * @property string $ngaytao
 * @property string $nguoisua
 * @property string $ngaysua
 */
class Cau extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_cau';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_tuyenduong', 'ten', 'doituongvuot', 'kmchinh', 'kmle', 'id_tinh', 'id_huyen', 'id_xa', 'loailanduong', 'dangcau', 'berongcau', 'taitrongthietke', 'theoquytrinh', 'namxaydung', 'bienbao_tencau', 'dongchay_thoikylu', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua'], 'required'],
            [['id_tuyenduong', 'doituongvuot', 'kmchinh', 'kmle', 'loailanduong', 'dangcau', 'namxaydung', 'namduavaokhaithac', 'chaychungvoi_duongsat', 'chaychungvoi_congtrinhthuyloi', 'bienbao_tencau', 'dongchay_nhiemman', 'dongchay_lulut', 'dongchay_thongthuyen', 'dongchay_capsong'], 'integer'],
            [['gocgiao', 'chieudai', 'sonhip', 'berongcau', 'berongphanxechay', 'berongphanbohanh', 'taitrongthietke', 'taitrongkhaithac', 'tinhkhong_vemuakho', 'tinhkhong_vemualu', 'tinhkhong_codinh', 'tinhkhong_thongthuyen', 'tinhkhong_trencau', 'bienbao_taitrong', 'bienbao_tocdo', 'bienbao_culyxe', 'bienbao_chieucao', 'bienbao_chieurong', 'dongchay_thuytrieu'], 'number'],
            [['ngaytao', 'ngaysua'], 'safe'],
            [['sohieu', 'nguoitao', 'nguoisua'], 'string', 'max' => 50],
            [['ten', 'tensongsuoi', 'donvixaydungcau'], 'string', 'max' => 255],
            [['vido', 'kinhdo'], 'string', 'max' => 20],
            [['id_tinh', 'id_huyen', 'id_xa'], 'string', 'max' => 5],
            [['sodonhip', 'theoquytrinh'], 'string', 'max' => 100],
            [['bienbao_khac', 'dongchay_thoikylu', 'file'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_cau' => 'ID',
            'id_tuyenduong' => 'Tuyến đường',
            'sohieu' => 'Số hiệu',
            'ten' => 'Tên cầu',
            'doituongvuot' => 'Vượt',
            'tensongsuoi' => 'Tên sông suối',
            'gocgiao' => 'Góc giao',
            'kmchinh' => 'Km chính',
            'kmle' => '+ km lẻ',
            'vido' => 'Vĩ độ',
            'kinhdo' => 'Kinh độ',
            'id_tinh' => 'Thuộc tỉnh',
            'id_huyen' => 'Thuộc huyện',
            'id_xa' => 'Thuộc xã',
            'loailanduong' => 'Loại làn đường',
            'dangcau' => 'Dạng cầu',
            'chieudai' => 'Chiều dài (m)',
            'sonhip' => 'Số nhịp',
            'sodonhip' => 'Sơ đồ nhịp (Ln)',
            'berongcau' => 'Bề rộng cầu (m)',
            'berongphanxechay' => 'Bề rộng phần xe chạy (m)',
            'berongphanbohanh' => 'Bề rộng phần bộ hành (m)',
            'taitrongthietke' => 'Tải trọng thiết kế',
            'theoquytrinh' => 'Theo quy trình',
            'namxaydung' => 'Năm xây dựng',
            'taitrongkhaithac' => 'Tải trọng khai thác',
            'namduavaokhaithac' => 'Năm đưa vào khai thác',
            'chaychungvoi_duongsat' => 'Chạy chung với đường sắt',
            'chaychungvoi_congtrinhthuyloi' => 'Chung với công trình thủy lợi',
            'donvixaydungcau' => 'Đơn vị xây dựng cầu',
            'tinhkhong_vemuakho' => 'Tĩnh không về mùa khô (m)',
            'tinhkhong_vemualu' => 'Tĩnh không về mùa lũ (m)',
            'tinhkhong_codinh' => 'Tĩnh không cố định (m)',
            'tinhkhong_thongthuyen' => 'Tĩnh không thông thuyền (m)',
            'tinhkhong_trencau' => 'Tĩnh không trên cầu',
            'bienbao_tencau' => 'Biển báo tên cầu',
            'bienbao_taitrong' => 'Biển báo tải trọng',
            'bienbao_tocdo' => 'Biển báo tốc độ',
            'bienbao_culyxe' => 'Biển báo cự ly xe',
            'bienbao_chieucao' => 'Biển báo chiều cao',
            'bienbao_chieurong' => 'Biển báo chiều rộng',
            'bienbao_khac' => 'Biển báo khác',
            'dongchay_thuytrieu' => 'Biên độ thủy triều',
            'dongchay_nhiemman' => 'Sông bị nhiễm mặn?',
            'dongchay_lulut' => 'Bị ảnh hưởng của lũ lụt?',
            'dongchay_thongthuyen' => 'Sông có thông thuyền?',
            'dongchay_capsong' => 'Cấp sông',
            'dongchay_thoikylu' => 'Thời kỳ lũ',
            'file' => 'Hồ sơ',
            'nguoitao' => 'Người tạo',
            'ngaytao' => 'Ngày tạo',
            'nguoisua' => 'Người sửa',
            'ngaysua' => 'Ngày sửa',
        ];
    }

    //Lấy tên tuyến đường của cầu
    public function getTuyenduong() {
        return $this->hasOne(Tuyenduong::className(), ['id_tuyenduong' => 'id_tuyenduong']);
    }

    //Lấy tên loại đối tượng vượt của cầu
    public function getLoaidoituongvuot() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'doituongvuot']);
    }

    //Lấy tên loại tải trọng thiết kế của cầu
    public function getLoaitaitrongthietke() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'taitrongthietke']);
    }

    //Lấy tên loại quy trình thiết kế của cầu
    public function getLoaiquytrinhthietke() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'theoquytrinh']);
    }

    //Lấy tên dạng cầu
    public function getLoaidangcau() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'dangcau']);
    }

    //Thuộc tỉnh
    public function getVntinh() {
        return $this->hasOne(vnTinh::className(), ['id_tinh' => 'id_tinh']);
    }

    //Thuộc huyện
    public function getVnhuyen() {
        return $this->hasOne(VnHuyen::className(), ['id_huyen' => 'id_huyen']);
    }

    //Thuộc xã
    public function getVnxa() {
        return $this->hasOne(VnXa::className(), ['id_xa' => 'id_xa']);
    }

    //Lấy tổng số thông tin cầu cho vào - site/index
    public function getCountCau() {
        return Cau::find()->where([])->count();
    }

    //Lấy tọa độ cầu để hiện thị vị trí cầu trên trang index
    public function getToado(){
        return Cau::find()->where(['!=', 'vido', ''])->andwhere(['!=', 'kinhdo', ''])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa tuyến đường
    public function getC($id) {
        return Cau::find()->where(['id_tuyenduong' => $id])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa người dùng
    public function getU($username) {
        return Cau::find()->where(['nguoitao' => $username])->orWhere(['nguoisua' => $username])->count();
    }
}
