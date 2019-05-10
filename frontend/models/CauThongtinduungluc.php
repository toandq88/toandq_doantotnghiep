<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_thongtinduungluc".
 *
 * @property int $id_thongtinduungluc
 * @property int $id_cau
 * @property int $thutu
 * @property string $bophanketcau
 * @property int $loaiduungluc
 * @property string $ghichu
 */
class CauThongtinduungluc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_thongtinduungluc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'thutu', 'bophanketcau', 'loaiduungluc', 'ghichu'], 'required'],
            [['id_cau', 'thutu', 'loaiduungluc'], 'integer'],
            [['bophanketcau', 'ghichu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_thongtinduungluc' => 'ID',
            'id_cau' => 'Cầu',
            'thutu' => 'Thứ tự',
            'bophanketcau' => 'Bộ phận kết cấu',
            'loaiduungluc' => 'Loại dự ứng lực',
            'ghichu' => 'Ghi chú',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Dự ứng lực
    public function getDuungluc()
    {
        return $this->hasOne(CauThongtinchung::className(), ['id_loai' => 'loaiduungluc']);
    }
    
    //Cầu - Thông tin dự ứng lực
    public function getLists($id) {
        return CauThongtinduungluc::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauThongtinduungluc::find()->where(['id_cau' => $id])->count();
    }
}
