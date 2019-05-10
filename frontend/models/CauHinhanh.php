<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_hinhanh".
 *
 * @property int $id_hinhanh
 * @property int $id_cau
 * @property string $file
 * @property string $loai
 */
class CauHinhanh extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tb_hinhanh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_cau', 'loai'], 'required'],
            [['id_cau'], 'integer'],
            [['file', 'noidung'], 'string', 'max' => 255],
            [['loai'], 'string', 'max' => 10],
            //[['file'],'file','extensions'=>'jpg,png,gif'],
            [['file'], 'image', 'extensions' => 'jpg,png,gif', 'maxSize' => 1024 * 1024 * 10, 'minWidth' => 100, 'minHeight' => 100, 'maxWidth' => 2000, 'maxHeight' => 1500], //10Mb
            [['file'], 'required', 'on'=>'create'],     //Chỉ required khi tạo mới
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_hinhanh' => 'ID',
            'id_cau' => 'Cầu',
            'file' => 'Ảnh',
            'loai' => 'Loại',
            'noidung' => 'Nội dung',
        ];
    }

    //Lấy tên cầu
    public function getCau() {
        return $this->hasOne(Cau::className(), ['id_cau' => 'id_cau']);
    }

    //Hình ảnh
    public function getLists($id) {
        return CauHinhanh::find()->where(['id_cau' => $id, 'loai' => 'CAU'])->all();
    }
    
    //Hình ảnh dọc cầu
    public function getLists_doc($id) {
        return CauHinhanh::findOne(['id_cau' => $id, 'loai' => 'CAU_DOC']);
    }
    
    //Hình ảnh ngang cầu
    public function getLists_ngang($id) {
        return CauHinhanh::findOne(['id_cau' => $id, 'loai' => 'CAU_NGANG']);
    }

    //số bản ghi- kiểm tra trước khi xóa cầu
    public function getC($id) {
        return CauHinhanh::find()->where(['id_cau' => $id])->count();
    }
}
