<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_ketcauduoi_mo".
 *
 * @property int $id_ketcauduoimo
 * @property int $id_cau
 * @property string $kyhieu
 * @property string $phia
 * @property int $thanmo_dang
 * @property int $thanmo_vatlieu
 * @property double $thanmo_chieucao
 * @property string $thanmo_vatlieuxamu
 * @property int $mongmo_dang
 * @property int $mongmo_vatlieu
 * @property int $tunon
 */
class CauKetcauduoiMo extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_cau_ketcauduoi_mo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_cau', 'kyhieu', 'phia', 'thanmo_dang', 'thanmo_vatlieu', 'thanmo_chieucao', 'thanmo_vatlieuxamu', 'mongmo_dang', 'mongmo_vatlieu', 'tunon'], 'required'],
            [['id_cau', 'thanmo_dang', 'thanmo_vatlieu', 'thanmo_vatlieuxamu', 'mongmo_dang', 'mongmo_vatlieu', 'tunon'], 'integer'],
            [['thanmo_chieucao'], 'number'],
            [['kyhieu'], 'string', 'max' => 3],
            [['phia'], 'string', 'max' => 100],
            [['thanmo_vatlieuxamu'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_ketcauduoimo' => 'ID',
            'id_cau' => 'Cầu',
            'kyhieu' => 'Ký hiệu',
            'phia' => 'Phía',
            'thanmo_dang' => 'Dạng thân mố',
            'thanmo_vatlieu' => 'Vật liệu thân mố',
            'thanmo_chieucao' => 'Chiều cao thân mố (m)',
            'thanmo_vatlieuxamu' => 'Vật liệu xà mũ',
            'mongmo_dang' => 'Dạng móng mố',
            'mongmo_vatlieu' => 'Vật liệu móng mố',
            'tunon' => 'Tứ nón',
        ];
    }

    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }

    //Lấy dạng thân mố
    public function getDangthanmo() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thanmo_dang']);
    }

    //Lấy vật liệu thân mố
    public function getVatlieuthanmo() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thanmo_vatlieu']);
    }

    //Lấy vật liệu thân mố
    public function getVatlieuxamu() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thanmo_vatlieuxamu']);
    }

    //Lấy dạng móng mố
    public function getDangmongmo() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'mongmo_dang']);
    }

    //Vật liệu móng mố
    public function getVatlieumongmo() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'mongmo_vatlieu']);
    }

    //Tứ nón
    public function getLoaitunon() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'tunon']);
    }

    //Kết cấu dưới mố - cau/view
    public function getLists($id) {
        return CauKetcauduoiMo::find()->where(['id_cau' => $id])->all();
    }

    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKetcauduoiMo::find()->where(['id_cau' => $id])->count();
    }

    //Kiểm tra thông tin cầu với mố này đã có hay chưa
    public function checkMo($id_cau, $kyhieu) {
        return CauKetcauduoiMo::find()->where(['id_cau' => $id_cau, 'kyhieu' => $kyhieu])->count();
    }

}
