<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_kebaove".
 *
 * @property int $id_kebaove
 * @property int $id_cau
 * @property int $thutu
 * @property string $mota
 * @property double $chieudai
 * @property double $chieucao
 * @property int $loaike
 * @property int $vatlieuchinh
 * @property int $loaimongke
 */
class CauKebaove extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_kebaove';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'mota', 'chieudai', 'chieucao', 'loaike', 'vatlieuchinh', 'loaimongke'], 'required'],
            [['id_cau', 'thutu', 'loaike', 'vatlieuchinh', 'loaimongke'], 'integer'],
            [['chieudai', 'chieucao'], 'number'],
            [['mota'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kebaove' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'mota' => 'Mô tả',
            'chieudai' => 'Chiều dài (m)',
            'chieucao' => 'Chiều cao (m)',
            'loaike' => 'Loại kè',
            'vatlieuchinh' => 'Vật liệu chính',
            'loaimongke' => 'Loại móng kè',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Loại kè bảo vệ
    public function getLoaikebaove()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'loaike']);
    }
    
    //Vật liệu
    public function getLoaivatlieu()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'vatlieuchinh']);
    }
    
    //Loại móng kè
    public function getMongke()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'loaimongke']);
    }
    
    //Cầu - Kè bảo vệ
    public function getLists($id) {
        return CauKebaove::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKebaove::find()->where(['id_cau' => $id])->count();
    }
}
