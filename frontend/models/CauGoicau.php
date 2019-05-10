<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_goicau".
 *
 * @property int $id_goicau
 * @property int $id_cau
 * @property int $thutu
 * @property string $trennhip
 * @property string $trenmotru
 * @property int $danglienket
 * @property int $vatlieu
 * @property string $ghichu
 */
class CauGoicau extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_goicau';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'trennhip', 'trenmotru', 'danglienket', 'vatlieu', 'ghichu'], 'required'],
            [['id_cau', 'thutu', 'danglienket', 'vatlieu'], 'integer'],
            [['trennhip', 'trenmotru'], 'string', 'max' => 50],
            [['ghichu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_goicau' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'trennhip' => 'Trên nhịp',
            'trenmotru' => 'Trên mố trụ',
            'danglienket' => 'Dạng liên kết',
            'vatlieu' => 'Vật liệu',
            'ghichu' => 'Ghi chú',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Dạng liên kết
    public function getLoaidanglienket()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'danglienket']);
    }
    
    //Vật liệu
    public function getLoaivatlieu()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'vatlieu']);
    }
    
    //Gối cầu
    public function getLists($id) {
        return CauGoicau::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauGoicau::find()->where(['id_cau' => $id])->count();
    }
}
