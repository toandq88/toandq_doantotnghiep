<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_chongthamvathoatnuoc".
 *
 * @property int $id_chongtham
 * @property int $id_cau
 * @property int $thutu
 * @property string $vitri
 * @property string $ghichu
 */
class CauChongthamvathoatnuoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_chongthamvathoatnuoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'vitri', 'ghichu'], 'required'],
            [['id_cau', 'thutu'], 'integer'],
            [['vitri', 'ghichu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_chongtham' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'vitri' => 'Vị trí',
            'ghichu' => 'Ghi chú',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Cầu - Thông tin dự ứng lực
    public function getLists($id) {
        return CauChongthamvathoatnuoc::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauChongthamvathoatnuoc::find()->where(['id_cau' => $id])->count();
    }
}
