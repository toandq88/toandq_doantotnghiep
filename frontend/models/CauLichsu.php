<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_cau_lichsu".
 *
 * @property int $id
 * @property int $id_cau
 * @property string $ngaythangnam
 * @property string $noidung
 */
class CauLichsu extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_cau_lichsu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id_cau', 'ngaythangnam', 'noidung'], 'required'],
                [['id_cau'], 'integer'],
                [['ngaythangnam'], 'safe'],
                [['noidung'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_cau' => 'Cầu',
            'ngaythangnam' => 'Ngày tháng năm',
            'noidung' => 'Nội dung',
        ];
    }

    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }

    //Ghi chú lịch sử cầu - cau/view
    public function getLists($id) {
        return CauLichsu::find()->where(['id_cau' => $id])->all();
    }
    
    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauLichsu::find()->where(['id_cau' => $id])->count();
    }
}
