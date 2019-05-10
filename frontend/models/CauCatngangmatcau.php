<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_catngangmatcau".
 *
 * @property int $id_catngangmatcau
 * @property int $id_cau
 * @property string $nhipcungdang
 * @property double $chieurongtoancau
 * @property double $phanxechay_chieurong
 * @property int $phanxechay_solanxe
 * @property double $phancach_berongphancachgiua
 * @property double $phancach_berongphancachbien
 * @property double $duongbohanh_berong
 * @property double $duongbohanh_beronglancan
 */
class CauCatngangmatcau extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cau_catngangmatcau';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cau', 'nhipcungdang', 'chieurongtoancau', 'phanxechay_chieurong', 'phanxechay_solanxe', 'phancach_berongphancachgiua', 'phancach_berongphancachbien', 'duongbohanh_berong', 'duongbohanh_beronglancan'], 'required'],
            [['id_cau', 'phanxechay_solanxe'], 'integer'],
            [['chieurongtoancau', 'phanxechay_chieurong', 'phancach_berongphancachgiua', 'phancach_berongphancachbien', 'duongbohanh_berong', 'duongbohanh_beronglancan'], 'number'],
            [['nhipcungdang'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_catngangmatcau' => 'ID',
            'id_cau' => 'Cầu',
            'nhipcungdang' => 'Nhịp cùng dạng',
            'chieurongtoancau' => 'Chiều rộng toàn cầu (m)',
            'phanxechay_chieurong' => 'Chiều rộng phần xe chạy (m)',
            'phanxechay_solanxe' => 'Số làn xe',
            'phancach_berongphancachgiua' => 'Bề rộng phân cách giữa (m)',
            'phancach_berongphancachbien' => 'Bề rộng phân cách biên (m)',
            'duongbohanh_berong' => 'Bề rộng đường bộ hành (m)',
            'duongbohanh_beronglancan' => 'Bề rộng lan can đường bộ (m)',
        ];
    }
    
    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }
    
    //Cắt ngang bề mặt cầu - cau/view
    public function getLists($id) {
        return CauCatngangmatcau::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauCatngangmatcau::find()->where(['id_cau' => $id])->count();
    }
}
