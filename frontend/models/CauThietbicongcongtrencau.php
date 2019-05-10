<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_thietbicongcongtrencau".
 *
 * @property int $id_thietbicongcong
 * @property int $id_cau
 * @property int $thutu
 * @property string $tenloai
 * @property string $coquanchuquan
 * @property string $ghichu
 */
class CauThietbicongcongtrencau extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_thietbicongcongtrencau';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'tenloai', 'coquanchuquan', 'ghichu'], 'required'],
            [['id_cau', 'thutu'], 'integer'],
            [['tenloai', 'coquanchuquan', 'ghichu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_thietbicongcong' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'tenloai' => 'Tên loại',
            'coquanchuquan' => 'Cơ quan chủ quản',
            'ghichu' => 'Ghi chú',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Cầu - Thiết bị công cộng trên cầu
    public function getLists($id) {
        return CauThietbicongcongtrencau::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauThietbicongcongtrencau::find()->where(['id_cau' => $id])->count();
    }
}
