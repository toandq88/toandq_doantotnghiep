<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_khecogian".
 *
 * @property int $id_khecogian
 * @property int $id_cau
 * @property int $thutu
 * @property string $vitri
 * @property int $loaikhe
 * @property int $vatlieuchinh
 * @property string $ghichu
 */
class CauKhecogian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_khecogian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'vitri', 'loaikhe', 'vatlieuchinh', 'ghichu'], 'required'],
            [['id_cau', 'thutu', 'loaikhe', 'vatlieuchinh'], 'integer'],
            [['vitri'], 'string', 'max' => 100],
            [['ghichu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_khecogian' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'vitri' => 'Vị trí',
            'loaikhe' => 'Loại khe',
            'vatlieuchinh' => 'Vật liệu chính',
            'ghichu' => 'Ghi chú',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Loại khe co giãn
    public function getLoaikhecogian()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'loaikhe']);
    }
    
    //Vật liệu
    public function getLoaivatlieu()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'vatlieuchinh']);
    }
    
    //Khe co giãn
    public function getLists($id) {
        return CauKhecogian::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauKhecogian::find()->where(['id_cau' => $id])->count();
    }
}
