<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_ketcauduoi_tru".
 *
 * @property int $id_ketcauduoitru
 * @property int $id_cau
 * @property string $kyhieu
 * @property int $thantru_dang
 * @property int $thantru_vatlieu
 * @property double $thantru_chieucao
 * @property string $thantru_vatlieuxamu
 * @property int $mongtru_dang
 * @property int $mongtru_vatlieu
 * @property int $ketcauphongho
 */
class CauKetcauduoiTru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_ketcauduoi_tru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'kyhieu', 'thantru_dang', 'thantru_vatlieu', 'thantru_chieucao', 'thantru_vatlieuxamu', 'mongtru_dang', 'mongtru_vatlieu', 'ketcauphongho'], 'required'],
            [['id_cau', 'thantru_dang', 'thantru_vatlieu', 'mongtru_dang', 'mongtru_vatlieu', 'ketcauphongho'], 'integer'],
            [['thantru_chieucao'], 'number'],
            [['kyhieu', 'thantru_vatlieuxamu'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ketcauduoitru' => 'ID',
            'id_cau' => 'Cầu',
            'kyhieu' => 'Ký hiệu',
            'thantru_dang' => 'Dạng thân trụ',
            'thantru_vatlieu' => 'Vật liệu thân trụ',
            'thantru_chieucao' => 'Chiều cao thân trụ (m)',
            'thantru_vatlieuxamu' => 'Vật liệu xà mũ',
            'mongtru_dang' => 'Dạng móng trụ',
            'mongtru_vatlieu' => 'Vật liệu móng trụ',
            'ketcauphongho' => 'Kết cấu phòng hộ',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Lấy dạng thân trụ
    public function getDangthantru() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thantru_dang']);
    }
    
    //Vật liệu thân trụ
    public function getVatlieuthantru() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thantru_vatlieu']);
    }
    
    //Vật liệu xà mũ
    public function getVatlieuxamu() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'thantru_vatlieuxamu']);
    }
    
    //Dạng móng trụ
    public function getDangmongtru() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'mongtru_dang']);
    }
    
    //Vật liệu móng trụ
    public function getVatlieumongtru() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'mongtru_vatlieu']);
    }
    
    //Kết cấu phòng hộ
    public function getLoaiketcauphongho() {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'ketcauphongho']);
    }
    
    //Kết cấu dưới trụ - cau/view
    public function getLists($id) {
        return CauKetcauduoiTru::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKetcauduoiTru::find()->where(['id_cau' => $id])->count();
    }
}
