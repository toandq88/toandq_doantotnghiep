<?php

namespace frontend\models;

use Yii;
use frontend\models\Donvi;

/**
 * This is the model class for table "tb_tuyenduong".
 *
 * @property int $id_tuyenduong
 * @property string $mahieu mã tuyến đường
 * @property string $tenduong
 * @property string $capduong
 * @property int $id_donviquanly
 * @property int $tukmchinh
 * @property int $tukmle
 * @property int $denkmchinh
 * @property int $denkmle
 * @property string $vidodau
 * @property string $kinhdodau
 * @property string $vidocuoi
 * @property string $kinhdocuoi
 * @property double $chieudaithucte
 * @property string $namhoanthanhxaydung
 * @property int $solanxecogioi
 * @property double $tocdothietke
 * @property string $nguoitao
 * @property string $ngaytao
 * @property string $nguoisua
 * @property string $ngaysua
 */
class Tuyenduong extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tb_tuyenduong';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['mahieu', 'tenduong', 'capduong', 'id_donviquanly', 'tukmchinh', 'tukmle', 'denkmchinh', 'denkmle', 'vidodau', 'kinhdodau', 'vidocuoi', 'kinhdocuoi', 'chieudaithucte', 'namhoanthanhxaydung', 'solanxecogioi', 'tocdothietke', 'nguoitao', 'ngaytao', 'nguoisua', 'ngaysua'], 'required', 'message' => 'Vui lòng nhập thông tin {attribute}.'],
            [['id_donviquanly', 'tukmchinh', 'tukmle', 'denkmchinh', 'denkmle', 'solanxecogioi'], 'integer'],
            [['chieudaithucte', 'tocdothietke'], 'number'],
            [['namhoanthanhxaydung', 'ngaytao', 'ngaysua'], 'safe'],
            [['mahieu', 'vidodau', 'kinhdodau', 'vidocuoi', 'kinhdocuoi'], 'string', 'max' => 20],
            [['tenduong', 'capduong', 'nguoitao', 'nguoisua'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_tuyenduong' => 'ID',
            'mahieu' => 'Mã hiệu',
            'tenduong' => 'Tên đường',
            'capduong' => 'Cấp đường',
            'id_donviquanly' => 'Đơn vị quản lý',
            'tukmchinh' => 'Từ km chính',
            'tukmle' => '+ km lẻ',
            'denkmchinh' => 'Đến km chính',
            'denkmle' => '+ km lẻ',
            'vidodau' => 'Vĩ độ đầu',
            'kinhdodau' => 'Kinh độ đầu',
            'vidocuoi' => 'Vĩ độ cuối',
            'kinhdocuoi' => 'Kinh độ cuối',
            'chieudaithucte' => 'Chiều dài thực tế (km)',
            'namhoanthanhxaydung' => 'Năm hoàn thành',
            'solanxecogioi' => 'Số làn xe cơ giới',
            'tocdothietke' => 'Tốc độ thiết kế (km/h)',
            'nguoitao' => 'Người tạo',
            'ngaytao' => 'Ngày tạo',
            'nguoisua' => 'Người sửa',
            'ngaysua' => 'Ngày sửa',
        ];
    }

    //Lấy tên đơn vị thực hiện quản lý tuyến đường
    public function getDonvi() {
        return $this->hasOne(Donvi::className(), ['id_donvi' => 'id_donviquanly']);
    }

    //Lấy tổng số tuyến đường - site/index
    public function getCountTuyenduong() {
        return Tuyenduong::find()->where([])->count();
    }
    
    //số bản ghi- kiểm tra trước khi xóa đơn vị
    public function getD($id) {
        return Tuyenduong::find()->where(['id_donviquanly' => $id])->count();
    }
}
